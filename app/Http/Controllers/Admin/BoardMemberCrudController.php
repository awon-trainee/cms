<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BoardMemberRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class BoardMemberCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class BoardMemberCrudController extends CrudController
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
        CRUD::setModel(\App\Models\BoardMember::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/board-member');
        CRUD::setEntityNameStrings('عضو مجلس الإدارة', 'أعضاء مجلس الإدارة');
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

        CRUD::column('picture')->type('image')->withFiles(['disk' => 'digitalocean']);
        CRUD::column('position_id')->type('relationship')->attribute('title')->label('المنصب');

        // change columns name to be in arabic
        CRUD::setColumnDetails('picture', [
            'label' => 'الصورة',
        ]);
        CRUD::setColumnDetails('name', [
            'label' => 'الإسم',
        ]);
        CRUD::setColumnDetails('position_id', [
            'label' => 'المنصب',
        ]);
        CRUD::setColumnDetails('stage_order', [
            'label' => 'ترتيب المرحلة',
        ]);
        CRUD::setColumnDetails('member_order', [
            'label' => 'ترتيب العضو',
        ]);
        CRUD::setColumnDetails('membership_type', [
            'label' => 'نوع العضوية',
        ]);
        CRUD::setColumnDetails('term_council', [
            'label' => 'مدة دورة المجلس',
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
        CRUD::setValidation(BoardMemberRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field('picture')
            ->label('الصورة')
            ->type('upload')
            ->withFiles([
                'disk'=> 'digitalocean',
                'path' => 'board-members', // the path inside the disk where file will be stored
                'deleteWhenEntryIsDeleted' => true,
                'mime_types' => ['image'],
                'fileNamer' => function($file, $uploader) { return \Str::random(40).'.'.$file->extension(); },
            ]);
        CRUD::field('position_id')
            ->type('select2')
            ->entity('position')
            ->attribute('title')
            ->model('App\Models\Position')
            ->label('المنصب')
            ->placeholder('أختر منصباً');

        // change fields name to be in arabic
        CRUD::field('name')->label('الإسم');
        CRUD::field('stage_order')->label('ترتيب المرحلة');
        CRUD::field('member_order')->label('ترتيب العضو');
        CRUD::field('membership_type')->label('نوع العضوية');
        CRUD::field('term_council')->label('مدة دورة المجلس');
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

        CRUD::column('picture')->type('image')->withFiles(['disk' => 'digitalocean']);
        CRUD::column('position_id')->type('relationship')->attribute('title')->label('Position');

        // change columns name to be in arabic
        CRUD::setColumnDetails('picture', [
            'label' => 'الصورة',
        ]);
        CRUD::setColumnDetails('name', [
            'label' => 'الإسم',
        ]);
        CRUD::setColumnDetails('position_id', [
            'label' => 'المنصب',
        ]);
        CRUD::setColumnDetails('stage_order', [
            'label' => 'ترتيب المرحلة',
        ]);
        CRUD::setColumnDetails('member_order', [
            'label' => 'ترتيب العضو',
        ]);
        CRUD::setColumnDetails('membership_type', [
            'label' => 'نوع العضوية',
        ]);
        CRUD::setColumnDetails('term_council', [
            'label' => 'مدة دورة المجلس',
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
        CRUD::field('picture')->type('upload')->withFiles(['disk' => 'digitalocean']);
    }
}
