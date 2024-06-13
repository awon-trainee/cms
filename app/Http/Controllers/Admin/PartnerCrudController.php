<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PartnerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PartnerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PartnerCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Partner::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/partner');
        CRUD::setEntityNameStrings('الشريك', 'الشركاء');
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

        CRUD::column('logo')->type('image')->withFiles(['disk' => 'digitalocean']);

        // change columns name to be in arabic
        CRUD::setColumnDetails('logo', [
            'label' => 'الشعار',
        ]);
        CRUD::setColumnDetails('name', [
            'label' => 'الاسم',
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
        CRUD::setValidation(PartnerRequest::class);
        CRUD::setFromDb(); // set fields from db columns.


        CRUD::field('logo')
            ->label('الشعار')
            ->type('upload')
            ->withFiles([
                'disk' => 'digitalocean',
                'path' => 'partners', // the path inside the disk where file will be stored
                'deleteWhenEntryIsDeleted' => true,
                'mime_types' => ['image'],
                'fileNamer' => function($file, $uploader) { return \Str::random(40).'.'.$file->extension(); },
            ]);

        CRUD::field('name')->label('الاسم');
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

        CRUD::column('logo')->type('image')->withFiles(['disk' => 'digitalocean']);

        // change columns name to be in arabic
        CRUD::setColumnDetails('logo', [
            'label' => 'الشعار',
        ]);
        CRUD::setColumnDetails('name', [
            'label' => 'الاسم',
        ]);
        CRUD::setColumnDetails('created_at', [
            'label' => 'تاريخ الإنشاء',
        ]);
        CRUD::setColumnDetails('updated_at', [
            'label' => 'تاريخ التعديل',
        ]);
    }

    /**
     * Define what happens when the delete operation is loaded.
     *
     * @return void
     */
    protected function setupDeleteOperation()
    {
        CRUD::field('logo')->type('upload')->withFiles(['disk' => 'digitalocean']);
    }
}
