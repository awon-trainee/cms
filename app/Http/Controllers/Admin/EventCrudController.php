<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EventRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class EventCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EventCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Event::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/event');
        CRUD::setEntityNameStrings('الفعالية', 'الفعاليات');
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
        CRUD::setColumnDetails('location', [
            'label' => 'المكان',
        ]);
        CRUD::setColumnDetails('start_date', [
            'label' => 'بداية الفعالية',
        ]);
        CRUD::setColumnDetails('end_date', [
            'label' => 'نهاية الفعالية',
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
        CRUD::setValidation(EventRequest::class);
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
                    'path' => 'events-images',
                    'fileNamer' => function($file, $uploader) { return \Str::random(40).'.'.$file->extension(); },
                ]
            ]])->hint('الصورة الاولى ستكون الصورة الرئيسية للفعالية');

        CRUD::field('title')->label('العنوان');
        CRUD::field('content')->label('المحتوى');
        CRUD::field('start_date')->label('بداية الفعالية');
        CRUD::field('end_date')->label('نهاية الفعالية');
        CRUD::field('location')->label('المكان');
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
        CRUD::setColumnDetails('content', [
            'label' => 'المحتوى',
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
        CRUD::setColumnDetails('location', [
            'label' => 'المكان',
        ]);
        CRUD::setColumnDetails('start_date', [
            'label' => 'تاريخ البداية',
        ]);
        CRUD::setColumnDetails('end_date', [
            'label' => 'تاريخ النهاية',
        ]);
    }
}
