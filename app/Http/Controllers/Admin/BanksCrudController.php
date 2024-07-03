<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BanksRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class BanksCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class BanksCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Banks::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/banks');
        CRUD::setEntityNameStrings('الحسابات البنكية', 'banks');
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
        CRUD::setColumnDetails('bank_name', [
            'label' => 'اسم المصرف'
        ]);
        CRUD::setColumnDetails('account_name', [
            'label' => 'اسم الحساب'
        ]);
        CRUD::setColumnDetails('account_number', [
            'label' => 'رقم الحساب'
        ]);
        CRUD::setColumnDetails('iban', [
            'label' => 'رقم الآيبان'
        ]);
        CRUD::setColumnDetails('image', [
            'label' => 'الصورة'
        ]);
        CRUD::column('image')->type('image')->withFiles(['disk' => 'public']);
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
        CRUD::field('bank_name')->label('اسم المصرف');
        CRUD::field('account_name')->label('اسم الحساب');
        CRUD::field('account_number')->label('رقم الحساب');
        CRUD::field('iban')->label('رقم الآيبان');
        CRUD::field('image')->label('الصورة')->type('upload')->withFiles([
            'disk' => 'public',
            'path' => 'storage',
            'deleteWhenEntryIsDeleted' => true,
            'mime_types' => ['image'],
            'fileNamer' => function($file, $uploader) { return \Str::random(40).'.'.$file->extension(); }
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

    protected function setupDeleteOperation()
    {
        CRUD::field('file')->type('upload')->withFiles(['disk' => 'public']);
    }
}
