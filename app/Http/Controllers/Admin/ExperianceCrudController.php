<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ExperianceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ExperianceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ExperianceCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Experiance::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/experiance');
        CRUD::setEntityNameStrings('الخبرات', 'الخبرات');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb('tasks'); // set columns from db columns.

        CRUD::setColumnDetails('position', [
            'label' => 'المنصب',
        ]);

        CRUD::setColumnDetails('start_at', [
            'label' => 'البداية',
        ]);

        CRUD::setColumnDetails('end_at', [
            'label' => 'النهاية',
        ]);

        CRUD::setColumnDetails('employer', [
            'label' => 'جعة العمل',
        ]);


        CRUD::setColumnDetails('board_member_id', [
            'label' => 'العضو'
        ]);

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ExperianceRequest::class);
        #CRUD::setFromDb(); // set fields from db columns.

        CRUD::field('position')->label('المنصب');
        CRUD::field('start_at')->label(' تاريخ البداية');
        CRUD::field('end_at')->label('تاريخ النهاية');
        CRUD::field('employer')->label('جهة العمل');

        CRUD::field('tasks')->label('المهام');


        CRUD::field('board_member_id')
            ->type('select2')
            ->entity('BoardMember')
            ->attribute('name')
            ->model('App\Models\BoardMember')
            ->label('العضو')
            ->placeholder('أختر العضو');


        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
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
}
