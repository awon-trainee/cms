<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CeoRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class CeoCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Ceo::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/ceo');
        CRUD::setEntityNameStrings('المدير التنفيذي', 'المدير التنفيذي');
    }


    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.
        CRUD::column('name')->type('string');
        CRUD::column('phone')->type('string');
        CRUD::column('mail')->type('string');
        CRUD::column('twitter')->type('string');
        CRUD::column('telegram')->type('string');
        CRUD::column('image')->type('image')->withFiles(['disk' => 'digitalocean']);

        CRUD::setColumnDetails('image', [
            'label' => 'الصورة الشخصية'
        ]);
        CRUD::setColumnDetails('name', [
            'label' => 'الإسم بالكامل'
        ]);
        CRUD::setColumnDetails('phone', [
            'label' => 'رقم الجوال'
        ]);
        CRUD::setColumnDetails('mail', [
            'label' => 'البريد الإلكتروني'
        ]);
        CRUD::setColumnDetails('twitter', [
            'label' => 'تويتر'
        ]);
        CRUD::setColumnDetails('telegram', [
            'label' => 'تليقرام'
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field('image')
            ->label('الصورة الشخصية')
            ->type('upload')
            ->withFiles([
                'disk'=> 'digitalocean',
                'path' => 'ceo', // the path inside the disk where file will be stored
                'deleteWhenEntryIsDeleted' => true,
                'mime_types' => ['image'],
                'fileNamer' => function($file, $uploader) { return \Str::random(40).'.'.$file->extension(); }
            ]);


        CRUD::field('name')->label('الإسم بالكامل');
        CRUD::field('phone')->label('رقم الجوال');
        CRUD::field('mail')->label('البريد الإلكتروني');
        CRUD::field('twitter')->label('تويتر');
        CRUD::field('telegram')->label('تليقرام');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    public function setupShowOperation()
    {
        $this->autoSetupShowOperation();

        CRUD::setColumnDetails('image', [
            'label' => 'الصورة الشخصية'
        ]);
        CRUD::setColumnDetails('name', [
            'label' => 'الإسم بالكامل'
        ]);
        CRUD::setColumnDetails('phone', [
            'label' => 'رقم الجوال'
        ]);
        CRUD::setColumnDetails('mail', [
            'label' => 'البريد الإلكتروني'
        ]);
        CRUD::setColumnDetails('twitter', [
            'label' => 'تويتر'
        ]);
        CRUD::setColumnDetails('telegram', [
            'label' => 'تليقرام'
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
        CRUD::field('image')->type('upload')->withFiles(['disk' => 'digitalocean']);
    }
}
