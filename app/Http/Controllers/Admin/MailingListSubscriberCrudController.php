<?php

namespace App\Http\Controllers\Admin;

use App\Exports\MailingListSubscribersExport;
use App\Http\Requests\MailingListSubscriberRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class MailingListSubscriberCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MailingListSubscriberCrudController extends CrudController
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
        CRUD::setModel(\App\Models\MailingListSubscriber::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/mailing-list-subscriber');
        CRUD::setEntityNameStrings('المشترك', 'المشتركين بالقائمة البريدية');
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

        CRUD::addButtonFromView('top', 'export', 'export', 'end');

        // change columns name to be in arabic
        CRUD::setColumnDetails('email', [
            'label' => 'البريد الإلكتروني',
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(MailingListSubscriberRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        // change fields name to be in arabic
        CRUD::field('email')->label('البريد الإلكتروني');
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
    /**
     * Export contact messages to excel
     *
     * @return BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new MailingListSubscribersExport, 'mailing-subscribers.xlsx');
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

        // change columns name to be in arabic
        CRUD::setColumnDetails('email', [
            'label' => 'البريد الإلكتروني',
        ]);
        CRUD::setColumnDetails('created_at', [
            'label' => 'تاريخ التسجيل',
        ]);
        CRUD::setColumnDetails('updated_at', [
            'label' => 'تاريخ التعديل',
        ]);
    }
}
