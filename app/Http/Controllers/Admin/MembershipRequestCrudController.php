<?php

namespace App\Http\Controllers\Admin;

use App\Enums\status\MembershipRequestStatus;
use App\Http\Requests\MembershipRequestRequest;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MembershipRequestCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MembershipRequestCrudController extends CrudController
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
        CRUD::setModel(\App\Models\MembershipRequest::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/membership-request');
        CRUD::setEntityNameStrings('طلب العضوية', 'طلبات العضوية');
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

        $this->prepareColumns();

        CRUD::filter('status')
            ->type('select2')
            ->label('الحالة')
            ->options(MembershipRequestStatus::toArray());
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        CRUD::setValidation(MembershipRequestRequest::class);
        CRUD::setFromDb(); // set fields from db columns.


        CRUD::removeField('user_id');

        // dd the user details
        CRUD::addField([
            'name' => 'Name',
            'type' => 'text',
            'label' => 'اسم المستخدم',
            'attributes' => [
                'disabled' => 'disabled',
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-4',
            ],
            'value' => $this->crud->getCurrentEntry()->user->name ?? '',
        ])->beforeField('status');

        CRUD::addField([
            'name' => 'Email',
            'type' => 'text',
            'label' => 'بريد المستخدم',
            'attributes' => [
                'disabled' => 'disabled',
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-4',
            ],
            'value' => $this->crud->getCurrentEntry()->user->email ?? '',
        ])->beforeField('status');

        CRUD::addField([
            'name' => 'Phone',
            'type' => 'text',
            'label' => 'رقم جوال المستخدم',
            'attributes' => [
                'disabled' => 'disabled',
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-4',
            ],
            'value' => $this->crud->getCurrentEntry()->user->phone_number ?? '',
        ])->beforeField('status');

        CRUD::addField([
            'name' => 'status',
            'type' => 'enum',
            'enum_class' => MembershipRequestStatus::class,
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

        $this->crud->getCurrentEntry()->user->notify(new \App\Notifications\ChangeStatusNotification($this->crud->getCurrentEntry(), 'membership_request'));

        return redirect($this->crud->getRoute());
    }

    /**
     * Define what happens when the Show operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-show
     * @return void
     */
    protected function setupShowOperation()
    {
        $this->autoSetupShowOperation();

        $this->prepareColumns();

        // add action to show ths user
        CRUD::addButtonFromModelFunction('line', 'show_user', 'showUserButton', 'beginning');
    }

    /**
     * Prepare columns for the CRUD.
     *
     * @return void
     */
    private function prepareColumns()
    {
        CRUD::removeColumn('status');

        CRUD::addColumn([
            'name' => 'status',
            'label' => 'الحالة',
            'type' => 'enum',
            'enum_class' => MembershipRequestStatus::class,
            'enum_function' => 'nameAr',
            'searchLogic' => false,
        ])->afterColumn('user_id');

        CRUD::removeColumn('user_id');

        CRUD::addColumn([
            'name' => 'user.name',
            'type' => 'select',
            'model' => User::class,
            'label' => 'اسم المستخدم',
            'searchLogic' => function ($query, $column, $searchTerm) {
                $query->orWhereHas('user', function ($q) use ($column, $searchTerm) {
                    $q->where('name', 'like', '%'.$searchTerm.'%');
                });
            },
        ])->beforeColumn('status');

        // user email
        CRUD::addColumn([
            'name' => 'user.email',
            'type' => 'select',
            'model' => User::class,
            'label' => 'بريد المستخدم',
            'searchLogic' => function ($query, $column, $searchTerm) {
                $query->orWhereHas('user', function ($q) use ($column, $searchTerm) {
                    $q->where('email', 'like', '%'.$searchTerm.'%');
                });
            },
        ])->beforeColumn('status');

        // user phone number
        CRUD::addColumn([
            'name' => 'user.phone_number',
            'type' => 'select',
            'model' => User::class,
            'label' => 'رقم جوال المستخدم',
            'searchLogic' => function ($query, $column, $searchTerm) {
                $query->orWhereHas('user', function ($q) use ($column, $searchTerm) {
                    $q->where('phone_number', 'like', '%'.$searchTerm.'%');
                });
            },
        ])->beforeColumn('status');

        CRUD::setColumnDetails('created_at', [
            'label' => 'تاريخ الطلب',
        ]);
        CRUD::setColumnDetails('updated_at', [
            'label' => 'تاريخ التعديل',
        ]);
    }
}
