<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GeneralAssemblyMemberRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class GeneralAssemblyMemberCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GeneralAssemblyMemberCrudController extends CrudController
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
        CRUD::setModel(\App\Models\GeneralAssemblyMember::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/general-assembly-member');
        CRUD::setEntityNameStrings('عضو الجمعية العمومية', 'أعضاء الجمعية العمومية');
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

        CRUD::column('position_id')->type('relationship')->attribute('title')->label('Position');
        CRUD::column('picture')->type('image')->withFiles(['disk' => 'digitalocean']);


        // change columns name to be in arabic
        CRUD::setColumnDetails('name', [
            'label' => 'الإسم',
        ]);
        CRUD::setColumnDetails('position_id', [
            'label' => 'المنصب',
        ]);
        CRUD::setColumnDetails('order', [
            'label' => 'الترتيب',
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
        CRUD::setValidation(GeneralAssemblyMemberRequest::class);
        CRUD::setFromDb(); // set fields from db columns.


        CRUD::field('position_id')
            ->type('select2')
            ->entity('position')
            ->attribute('title')
            ->model('App\Models\Position')
            ->label('المنصب')
            ->placeholder('اختر منصباً');


        CRUD::field('picture')
            ->label('الصورة')
            ->type('upload')
            ->withFiles([
                'disk'=> 'digitalocean',
                'path' => 'general-assembly-members', // the path inside the disk where file will be stored
                'deleteWhenEntryIsDeleted' => true,
                'mime_types' => ['image'],
                'fileNamer' => function($file, $uploader) { return \Str::random(40).'.'.$file->extension(); }
            ]);

        CRUD::field('name')->type('text')->label('الإسم');
        CRUD::field('order')->type('number')->label('الترتيب');
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

        CRUD::column('position_id')->type('relationship')->attribute('title')->label('Position');

        // change columns name to be in arabic
        CRUD::setColumnDetails('name', [
            'label' => 'الإسم',
        ]);
        CRUD::setColumnDetails('position_id', [
            'label' => 'المنصب',
        ]);
        CRUD::setColumnDetails('order', [
            'label' => 'الترتيب',
        ]);
        CRUD::setColumnDetails('created_at', [
            'label' => 'تاريخ الإنشاء',
        ]);
        CRUD::setColumnDetails('updated_at', [
            'label' => 'تاريخ التعديل',
        ]);
    }

    protected function setupDeleteOperation()
    {
        CRUD::field('picture')->type('upload')->withFiles(['disk' => 'digitalocean']);
    }

}
