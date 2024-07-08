<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VideoLibraryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class VideoLibraryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class VideoLibraryCrudController extends CrudController
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
        CRUD::setModel(\App\Models\VideoLibrary::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/video-library');
        CRUD::setEntityNameStrings('مكتبة الفيديو', 'مكتبة الفيديوهات');
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
        CRUD::setColumnDetails('title', [
            'label' => 'العنوان'
        ]);
        CRUD::setColumnDetails('video', [
            'label' => 'الفيديو'
        ]);
        CRUD::setColumnDetails('date', [
            'label' => 'التاريخ'
        ]);

        CRUD::column('video')->type('upload')->withFiles(['disk' => 'digitalocean']);

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
        CRUD::setValidation(VideoLibraryRequest::class);

        CRUD::setFromDb(); // set fields from db columns.
        CRUD::field('video')->label('الفيديو')->type('upload')->withFiles([
            'disk' => 'digitalocean',
            'path' => 'video-library',
            'deleteWhenEntryIsDeleted' => true,
            'mime_types' => ['video'],
            'fileNamer' => function($file, $uploader) { return \Str::random(40).'.'.$file->extension(); }
        ]);
        CRUD::field('title')->label('العنوان');
        CRUD::field('date')->label('التاريخ');

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

    protected function setupDeleteOperation()
    {
        CRUD::field('file')->type('upload')->withFiles(['disk' => 'digitalocean']);
    }
}