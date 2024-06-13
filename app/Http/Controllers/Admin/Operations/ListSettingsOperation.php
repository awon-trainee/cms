<?php

namespace App\Http\Controllers\Admin\Operations;

use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Route;

trait ListSettingsOperation
{
    protected function setupListSettingsOperation()
    {
        return view('admin.settings.index', [
            'title' => $this->title,
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                $this->title => false,
            ],
            'route' => $this->route,
            'page' => 'resources/views/admin/settings/index.blade.php',
            'controller' => $this::class,
            'settings' => $this->settings,
        ]);
    }
}
