<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Operations\ListSettingsOperation;
use App\Http\Controllers\Admin\Operations\SetupSettingsOperation;
use App\Http\Controllers\Admin\Operations\UpdateSettingsOperation;
use App\Settings\GeneralSettings;

/**
 * Class GeneralSettingsController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GeneralSettingsController extends SettingsController
{
    use SetupSettingsOperation, ListSettingsOperation, UpdateSettingsOperation;

    protected $settings;

    protected string $title = 'الإعدادات العامة';

    protected string $route = 'page.general_settings';

    public function __construct()
    {
        $this->setupSettings(GeneralSettings::class);
        $this->setupSettingsRequest();
    }

    public function index()
    {
        return $this->setupListSettingsOperation();
    }

    public function edit()
    {
        return $this->setupEditSettingsOperation();
    }
}
