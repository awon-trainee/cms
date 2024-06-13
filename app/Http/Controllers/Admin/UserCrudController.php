<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends \Backpack\PermissionManager\app\Http\Controllers\UserCrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('المستخدم', 'المستخدمين');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    public function setupListOperation()
    {
        parent::setupListOperation();

        CRUD::filter('employment_requests')
            ->type('simple')
            ->label('لديه طلب توظيف')
            ->whenActive(function () {
                CRUD::addClause('whereHas', 'employmentRequests');
            });

        CRUD::filter('volunteering_requests')
            ->type('simple')
            ->label('لديه طلب تطوع')
            ->whenActive(function () {
                CRUD::addClause('whereHas', 'volunteeringRequests');
            });

        CRUD::filter('membership_requests')
            ->type('simple')
            ->label('لديه طلب عضوية')
            ->whenActive(function () {
                CRUD::addClause('whereHas', 'membershipRequests');
            });

        CRUD::addButtonFromView('top', 'export', 'export', 'end');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    public function setupCreateOperation()
    {

        parent::setupCreateOperation();
        CRUD::setValidation(UserRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field('phone_number')->label('رقم الجوال');
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    public function setupUpdateOperation()
    {
        $this->setupCreateOperation();

        CRUD::removeField('password');
        CRUD::removeField('password_confirmation');
    }

    /**
     * Export users to excel
     *
     * @return BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
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

        CRUD::addColumn([
            'name' => 'employmentRequests',
            'type' => 'relationship_count',
            'label' => 'عدد طلبات التوظيف',
            'suffix' => ' طلب',
        ]);

        CRUD::addColumn([
            'name' => 'volunteeringRequests',
            'type' => 'relationship_count',
            'label' => 'عدد طلبات التطوع',
            'suffix' => ' طلب',
        ]);

        CRUD::addColumn([
            'name' => 'membershipRequests',
            'type' => 'relationship_count',
            'label' => 'عدد طلبات العضوية',
            'suffix' => ' طلب',
        ]);

        CRUD::addColumn([
            'name' => 'initiativeRegistrations',
            'type' => 'relationship_count',
            'label' => 'عدد التسجيلات في المبادرات',
            'suffix' => ' تسجيل',
        ]);

        $this->crud->addColumns([
            [
                'label'     => trans('backpack::permissionmanager.roles'), // Table column heading
                'type'      => 'select_multiple',
                'name'      => 'roles', // the method that defines the relationship in your Model
                'entity'    => 'roles', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model'     => config('permission.models.role'), // foreign key model
            ],
        ]);

        CRUD::setColumnDetails('name', [
            'label' => 'الاسم',
        ]);
        CRUD::setColumnDetails('email', [
            'label' => 'البريد الالكتروني',
        ]);
        CRUD::setColumnDetails('phone_number', [
            'label' => 'رقم الهاتف',
        ]);
        CRUD::setColumnDetails('created_at', [
            'label' => 'تاريخ الانشاء',
        ]);
        CRUD::setColumnDetails('updated_at', [
            'label' => 'تاريخ التعديل',
        ]);
    }
}
