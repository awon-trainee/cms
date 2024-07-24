<?php

namespace App\Http\Controllers\Admin;

use App\Exports\InitiativesExport;
use App\Exports\UsersExport;
use App\Http\Requests\InitiativeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class InitiativeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class InitiativeCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Initiative::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/initiative');
        CRUD::setEntityNameStrings('المبادرة', 'المبادرات');
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

        CRUD::column('image')->type('image')->withFiles([
            'disk' => 'digitalocean'
        ]);

        CRUD::addColumn([
            'name' => 'registrations',
            'type' => 'relationship_count',
            'label' => 'عدد المسجلين',
            'suffix' => ' مسجل',
        ]);

        CRUD::filter('is_active')
            ->type('select2')
            ->label('الحالة')
            ->options([
                0 => 'غير مفعل',
                1 => 'مفعل',
            ]);

        CRUD::addButtonFromView('top', 'export', 'export', 'end');

        // change columns name to be in arabic
        CRUD::setColumnDetails('image', [
            'label' => 'الصورة',
        ]);
        CRUD::setColumnDetails('name', [
            'label' => 'الاسم',
        ]);
        CRUD::setColumnDetails('description', [
            'label' => 'الوصف',
        ]);
        CRUD::setColumnDetails('link', [
            'label' => 'رابط التسجيل للمبادرة',
        ]);
        CRUD::setColumnDetails('is_active', [
            'label' => 'الحالة',
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
        CRUD::setValidation(InitiativeRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field('image')
            ->label('الصورة')
            ->type('upload')
            ->withFiles([
                'disk' => 'digitalocean',
                'path' => 'initiatives', // the path inside the disk where file will be stored
                'deleteWhenEntryIsDeleted' => true,
                'mime_types' => ['image'],
                'fileNamer' => function($file, $uploader) { return \Str::random(40).'.'.$file->extension(); },
            ]);

        CRUD::field('name')->label('الاسم');
        CRUD::field('description')->label('الوصف');
        CRUD::field('link')->label('رابط التسجيل للمبادرة');
        CRUD::field('is_active')->label('مفعلة');
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

        CRUD::addColumn([
            'name' => 'registrations',
            'type' => 'relationship_count',
            'label' => 'عدد المسجلين',
            'suffix' => ' مسجل',
        ]);

        CRUD::column('image')->type('image')->withFiles([
            'disk' => 'digitalocean'
        ]);

        CRUD::addButtonFromModelFunction('line', 'show_registrations', 'showRegistrationsButton', 'beginning');

        // change columns name to be in arabic
        CRUD::setColumnDetails('image', [
            'label' => 'الصورة',
        ]);
        CRUD::setColumnDetails('name', [
            'label' => 'الاسم',
        ]);
        CRUD::setColumnDetails('description', [
            'label' => 'الوصف',
        ]);
        CRUD::setColumnDetails('link', [
            'label' => 'رابط التسجيل للمبادرة',
        ]);
        CRUD::setColumnDetails('is_active', [
            'label' => 'الحالة',
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
        CRUD::field('image')->type('upload')->withFiles(['disk' => 'digitalocean']);
    }

    /**
     * Export initiatives to excel
     *
     * @return BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new InitiativesExport(), 'initiatives.xlsx');
    }
}
