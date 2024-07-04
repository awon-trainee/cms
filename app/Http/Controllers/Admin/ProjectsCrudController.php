<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProjectsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProjectsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Projects::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/projects');
        CRUD::setEntityNameStrings('المشروع', 'المشاريع');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb();
        CRUD::setColumnDetails('title', [
            'label' => 'العنوان'
        ]);
        CRUD::setColumnDetails('content', [
            'label' => 'المحتوى'
        ]);
        CRUD::setColumnDetails('image', [
            'label' => 'الصورة'
        ]);
        CRUD::column('image')->type('image')->withFiles(['disk' => 'digitalocean']);
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

        CRUD::field('image')->label('الصورة')->type('upload')->withFiles([
            'disk' => 'digitalocean',
            'path' => 'projects',
            'deleteWhenEntryIsDeleted' => true,
            'mime_types' => ['image'],
            'fileNamer' => function($file, $uploader) { return \Str::random(40).'.'.$file->extension(); }
        ]);

        CRUD::field('title')->label('العنوان');
        CRUD::field('content')->label('المحتوى');

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
