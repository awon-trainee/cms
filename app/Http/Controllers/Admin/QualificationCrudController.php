<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\QualificationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class QualificationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class QualificationCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Qualification::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/qualification');
        CRUD::setEntityNameStrings('المؤهلات', 'المؤهلات');
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

        CRUD::setColumnDetails('name', [
            'label' => 'الإسم',
        ]);

        CRUD::setColumnDetails('specialization', [
            'label' => 'التخصص',
        ]);

        CRUD::setColumnDetails('university', [
            'label' => 'الجامعة',
        ]);

        CRUD::setColumnDetails('specialization', [
            'label' => 'الدولة',
        ]);

        CRUD::setColumnDetails('year', [
            'label' => 'السنة',
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
        CRUD::setValidation(QualificationRequest::class);
        #CRUD::setFromDb(); // set fields from db columns.

        CRUD::field('name')->label('اسم المؤهل');
        CRUD::field('country')->label(' الدولة');
        CRUD::field('specialization')->label('التخصص');
        CRUD::field('university')->label('الجامعة');
        CRUD::field('year')->label('السنة');

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
