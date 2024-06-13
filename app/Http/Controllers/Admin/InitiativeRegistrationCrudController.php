<?php

namespace App\Http\Controllers\Admin;

use App\Enums\status\InitiativeRegistrationStatus;
use App\Exports\InitiativeRegistrationsExport;
use App\Exports\UsersExport;
use App\Http\Requests\InitiativeRegistrationRequest;
use App\Models\Initiative;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class InitiativeRegistrationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class InitiativeRegistrationCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation {
        update as traitUpdate;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\InitiativeRegistration::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/initiative-registration');
        CRUD::setEntityNameStrings('المسجل في المبادرة', 'المسجلين في المبادرات');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        CRUD::filter('status')
            ->type('select2')
            ->label('الحالة')
            ->options(InitiativeRegistrationStatus::toArray());

        CRUD::filter('initiative_id')
            ->type('select2')
            ->label('المبادرة')
            ->options(Initiative::all()->pluck('name', 'id')->toArray());

        $this->prepareColumns();

        CRUD::addButtonFromView('top', 'export', 'export', 'end');

        // change columns name to be in arabic
        CRUD::setColumnDetails('initiative', [
            'label' => 'المبادرة',
        ]);
        CRUD::setColumnDetails('user.name', [
            'label' => 'الإسم',
        ]);
        CRUD::setColumnDetails('user.email', [
            'label' => 'البريد الإلكتروني',
        ]);
        CRUD::setColumnDetails('user.phone_number', [
            'label' => 'رقم الهاتف',
        ]);
        CRUD::setColumnDetails('status', [
            'label' => 'الحالة',
        ]);
        CRUD::setColumnDetails('created_at', [
            'label' => 'تاريخ التسجيل',
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        CRUD::setValidation(InitiativeRegistrationRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::removeField('initiative_id');
        CRUD::removeField('user_id');


        CRUD::addField([
            'name' => 'initiative.name',
            'type' => 'text',
            'label' => 'اسم المبادرة',
            'attributes' => [
                'disabled' => 'disabled',
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
            'value' => $this->crud->getCurrentEntry()->initiative->name ?? '',
        ])->beforeField('status');

        CRUD::addField([
            'name' => 'user.name',
            'type' => 'text',
            'label' => 'اسم المستخدم',
            'attributes' => [
                'disabled' => 'disabled',
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
            'value' => $this->crud->getCurrentEntry()->user->name ?? '',
        ])->beforeField('status');

        CRUD::addField([
            'name' => 'user.email',
            'type' => 'text',
            'label' => 'بريد المستخدم',
            'attributes' => [
                'disabled' => 'disabled',
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
            'value' => $this->crud->getCurrentEntry()->user->email ?? '',
        ])->beforeField('status');

        CRUD::addField([
            'name' => 'user.phone_number',
            'type' => 'text',
            'label' => 'رقم جوال المستخدم',
            'attributes' => [
                'disabled' => 'disabled',
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
            'value' => $this->crud->getCurrentEntry()->user->phone_number ?? '',
        ])->beforeField('status');

        CRUD::addField([
            'name' => 'status',
            'type' => 'enum',
            'enum_class' => InitiativeRegistrationStatus::class,
            'enum_function' => 'nameAr',
            'label' => 'الحالة',
        ])->afterField('user_id');
    }

    /**
     * Define what happens when the Update operation is executed.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update()
    {
        $this->traitUpdate();

        $this->crud->getCurrentEntry()->user->notify(new \App\Notifications\ChangeStatusNotification($this->crud->getCurrentEntry(), 'initiative_registration', $this->crud->getCurrentEntry()->initiative->name ?? ''));

        return redirect($this->crud->getRoute());
    }

    /**
     * Define what happens when the Show operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-show
     * @return void
     */
    public function setupShowOperation()
    {
        $this->autoSetupShowOperation();


        CRUD::addButtonFromModelFunction('line', 'show_user', 'showUserButton', 'beginning');

        CRUD::addButtonFromModelFunction('line', 'show_initiative', 'showInitiativeButton', 'beginning');

        $this->prepareColumns();

        // change columns name to be in arabic

        CRUD::setColumnDetails('created_at', [
            'label' => 'تاريخ التسجيل',
        ]);
        CRUD::setColumnDetails('updated_at', [
            'label' => 'تاريخ التعديل',
        ]);
    }

    /**
     * Export initiative registrations to excel
     *
     * @return BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new InitiativeRegistrationsExport, 'registrations.xlsx');
    }

    private function prepareColumns(){

        CRUD::removeColumn('initiative_id');
        CRUD::removeColumn('user_id');
        CRUD::removeColumn('status');

        CRUD::addColumn([
            'name' => 'initiative',
            'type' => 'relationship',
            'label' => 'المبادرة',
            'searchLogic' => function ($query, $column, $searchTerm) {
                $query->orWhereHas('initiative', function ($q) use ($column, $searchTerm) {
                    $q->where('name', 'like', '%'.$searchTerm.'%');
                });
            },
        ]);

        CRUD::addColumn([
            'name' => 'user.name',
            'type' => 'relationship',
            'label' => 'الإسم',
            'searchLogic' => function ($query, $column, $searchTerm) {
                $query->orWhereHas('user', function ($q) use ($column, $searchTerm) {
                    $q->where('name', 'like', '%'.$searchTerm.'%');
                });
            },
        ]);

        CRUD::addColumn([
            'name' => 'user.email',
            'type' => 'relationship',
            'label' => 'البريد الإلكتروني',
            'searchLogic' => function ($query, $column, $searchTerm) {
                $query->orWhereHas('user', function ($q) use ($column, $searchTerm) {
                    $q->where('email', 'like', '%'.$searchTerm.'%');
                });
            },
        ]);

        CRUD::addColumn([
            'name' => 'status',
            'type' => 'enum',
            'label' => 'الحالة',
            'enum_class' => InitiativeRegistrationStatus::class,
            'enum_function' => 'nameAr',
            'searchLogic' => false,
        ]);

        CRUD::addColumn([
            'name' => 'created_at',
            'type' => 'datetime',
            'label' => 'تاريخ التسجيل',
            'searchLogic' => false,
        ]);
    }
}
