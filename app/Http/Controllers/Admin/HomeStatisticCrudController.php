<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HomeStatisticRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class HomeStatisticCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class HomeStatisticCrudController extends CrudController
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
        CRUD::setModel(\App\Models\HomeStatistic::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/home-statistic');
        CRUD::setEntityNameStrings('إحصائيات الرئيسية', 'إحصائيات الرئيسية');
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

        CRUD::column('icon')->type('image')->withFiles(['disk' => 'digitalocean']);

        // change columns name to be in arabic
        CRUD::setColumnDetails('icon', [
            'label' => 'الأيقونة',
        ]);
        CRUD::setColumnDetails('title', [
            'label' => 'العنوان',
        ]);
        CRUD::setColumnDetails('value', [
            'label' => 'القيمة',
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
        CRUD::setValidation(HomeStatisticRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field('icon')
            ->label('الأيقونة')
            ->type('upload')
            ->withFiles([
                'disk' => 'digitalocean',
                'path' => 'home-statistics', // the path inside the disk where file will be stored
                'deleteWhenEntryIsDeleted' => true,
                'mime_types' => ['image'],
                'fileNamer' => function($file, $uploader) { return \Str::random(40).'.'.$file->extension(); },
            ]);

        CRUD::field('title')->label('العنوان');
        CRUD::field('value')->label('القيمة');
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

        CRUD::column('icon')->type('image')->withFiles(['disk' => 'digitalocean']);

        // change columns name to be in arabic
        CRUD::setColumnDetails('icon', [
            'label' => 'الأيقونة',
        ]);
        CRUD::setColumnDetails('title', [
            'label' => 'العنوان',
        ]);
        CRUD::setColumnDetails('value', [
            'label' => 'القيمة',
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
        CRUD::field('icon')->type('upload')->withFiles(['disk' => 'digitalocean']);
    }
}
