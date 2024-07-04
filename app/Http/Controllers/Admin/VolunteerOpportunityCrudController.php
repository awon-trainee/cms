<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VolunteerOpportunityRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class VolunteerOpportunityCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class VolunteerOpportunityCrudController extends CrudController
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
        CRUD::setModel(\App\Models\VolunteerOpportunity::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/volunteer-opportunity');
        CRUD::setEntityNameStrings('volunteer opportunity', 'volunteer opportunities');
        CRUD::setEntityNameStrings('فرص التطوع', 'إدراج فرص التطوع');
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
        CRUD::setColumnDetails('volunteer_title', [
            'label' => 'مسمى التطوع'
        ]);
        CRUD::setColumnDetails('volunteer_desc', [
            'label' => 'تفاصيل التطوع'
        ]);
        CRUD::setColumnDetails('volunteer_link', [
            'label' => 'رابط التسجيل'
        ]);
        CRUD::setColumnDetails('image', [
            'label' => 'الصورة'
        ]);
        CRUD::column('image')->type('image')->withFiles(['disk' => 'digitalocean']);

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
        CRUD::setFromDb(); // set fields from db columns.
        
        CRUD::field('volunteer_title')->label('مسمى التطوع');
        CRUD::field('volunteer_desc')->label('تفاصيل التطوع');
        CRUD::field('volunteer_link')->label('رابط التقديم');
        CRUD::field('image')->label('الصورة')->type('upload')->withFiles([
            'disk' => 'digitalocean',
            'path' => 'volunteer-opportunities',
            'deleteWhenEntryIsDeleted' => true,
            'mime_types' => ['image'],
            'fileNamer' => function($file, $uploader) { return \Str::random(40).'.'.$file->extension(); }
        ]);


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
