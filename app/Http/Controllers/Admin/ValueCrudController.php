<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ValueRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ValueCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ValueCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Value::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/value');
        CRUD::setEntityNameStrings('القيمة', 'القيمة');
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

        // change columns name to be in arabic
        CRUD::setColumnDetails('title', [
            'label' => 'العنوان',
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
        CRUD::setValidation(ValueRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field('title')->type('text')->label('العنوان');
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
     * Define what happens when the Show operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-show
     * @return void
     */
    public function setupShowOperation()
    {
        $this->autoSetupShowOperation();


        // change columns name to be in arabic
        CRUD::setColumnDetails('title', [
            'label' => 'العنوان',
        ]);
        CRUD::setColumnDetails('created_at', [
            'label' => 'تاريخ الإنشاء',
        ]);
        CRUD::setColumnDetails('updated_at', [
            'label' => 'تاريخ التعديل',
        ]);
    }
}
