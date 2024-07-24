<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewgovernanceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class NewgovernanceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class NewgovernanceCrudController extends CrudController
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
        CRUD::setModel(\App\Models\NewGovernance::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/newgovernance');
        CRUD::setEntityNameStrings( 'ملف جديد', 'ملفات صفحات قسم الحوكمة');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        CRUD::column('file')->type('upload')->withFiles(['disk' => 'digitalocean']);

        // Change columns name to be in Arabic
        CRUD::setColumnDetails('file', [
            'label' => 'الملف',
        ]);
        CRUD::setColumnDetails('title', [
            'label' => 'العنوان',
        ]);
        CRUD::setColumnDetails('at_page', [
            'label' => 'اسم الصفحة في الحوكمة',
            'type' => 'select',
            'entity' => 'governance',
            'attribute' => 'name_ar',
            'model' => 'App\Models\Governance'
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
        // CRUD::setValidation(NewgovernanceRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field('file')
            ->label('الملف')
            ->type('upload')
            ->withFiles([
                'disk' => 'digitalocean',
                'path' => 'new-governance-pages', // the path inside the disk where file will be stored
                'deleteWhenEntryIsDeleted' => true,
                'mime_types' => ['pdf'],
                'fileNamer' => function($file, $uploader) { return \Str::random(40).'.pdf'; },
            ]);

        CRUD::field('title')->label('العنوان');

        CRUD::addField([
            'name' => 'at_page',
            'label' => 'الصفحة في الحوكمة',
            'type' => 'select2',
            'entity' => 'governance',
            'attribute' => 'name_ar',
            'model' => 'App\Models\Governance'
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
        $this->setupCreateOperation();
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

        CRUD::column('file')->type('upload')->withFiles(['disk' => 'digitalocean']);

        CRUD::setColumnDetails('file', [
            'label' => 'الملف',
        ]);
        CRUD::setColumnDetails('title', [
            'label' => 'العنوان',
        ]);
        CRUD::setColumnDetails('created_at', [
            'label' => 'تاريخ الإنشاء',
        ]);
        CRUD::setColumnDetails('updated_at', [
            'label' => 'تاريخ التعديل',
        ]);
        CRUD::setColumnDetails('at_page', [
            'label' => 'الصفحة في الحوكمة',
            'type' => 'select',
            'entity' => 'governance',
            'attribute' => 'name_ar',
            'model' => 'App\Models\Governance'
        ]);
    }

    
}