<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Operations\ListSettingsOperation;
use App\Http\Controllers\Admin\Operations\SetupSettingsOperation;
use App\Http\Controllers\Admin\Operations\UpdateSettingsOperation;
use App\Settings\HomePageSettings;

/**
 * Class HomeSettingsController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class HomeSettingsController extends SettingsController
{
    use SetupSettingsOperation, ListSettingsOperation, UpdateSettingsOperation;

    protected HomePageSettings $settings;

    protected string $title = 'إعدادات الصفحة الرئيسية';

    protected string $route = 'page.home_page';

    public function __construct()
    {
        $this->setupSettings(HomePageSettings::class);
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
