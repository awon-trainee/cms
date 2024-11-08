<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class NewsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class NewsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\News::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/news');
        CRUD::setEntityNameStrings('الخبر', 'الأخبار');
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

        CRUD::column('content')->type('text')->limit(20);

        // change columns name to be in arabic
        CRUD::setColumnDetails('content', [
            'label' => 'المحتوى',
        ]);
        CRUD::setColumnDetails('title', [
            'label' => 'العنوان',
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
        CRUD::setValidation(NewsRequest::class);
        CRUD::setFromDb(); // set fields from db columns.


        CRUD::field('images')
            ->label('الصور')
            ->subfields([
            [
            'name' => 'image',
            'label' => 'الصورة',
            'type' => 'upload',
            'upload' => true,
            'withFiles' => [
                'disk' => 'digitalocean',
                'path' => 'news-images',
                'fileNamer' => function($file, $uploader) { return \Str::random(40).'.'.$file->extension(); },
            ]
        ]])->hint('الصورة الأولى ستكون الصورة الرئيسية للخبر');

        // change fields name to be in arabic
        CRUD::field('title')->label('العنوان');
        CRUD::field('content')->label('المحتوى');

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

        //show all images uploaded from the images relation (one to many)
        foreach (CRUD::getCurrentEntry()->images as $index => $image) {
            CRUD::addColumn([
                'name' => 'image.'.$image,
                'label' => 'الصورة '.($index + 1),
                'type' => 'image',
                'height' => '100px',
                'width' => '100px',
                'upload' => false,
                'value' => config('filesystems.disks.digitalocean.url').'/'.$image->image,
            ]);
        }

        // change columns name to be in arabic
        CRUD::setColumnDetails('title', [
            'label' => 'العنوان',
        ]);
        CRUD::setColumnDetails('content', [
            'label' => 'المحتوى',
        ]);
        CRUD::setColumnDetails('created_at', [
            'label' => 'تاريخ الإنشاء',
        ]);
        CRUD::setColumnDetails('updated_at', [
            'label' => 'تاريخ التعديل',
        ]);
    }

}
