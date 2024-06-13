<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Operations\ListSettingsOperation;
use App\Http\Controllers\Admin\Operations\SetupSettingsOperation;
use App\Http\Controllers\Admin\Operations\UpdateSettingsOperation;
use App\Settings\ContactUsSetting;

/**
 * Class AboutUsSettingsController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ContactUsSettingsController extends SettingsController
{
    use SetupSettingsOperation, ListSettingsOperation, UpdateSettingsOperation;

    protected $settings;

    protected string $title = 'إعدادات صفحة تواصل معنا';

    protected string $route = 'page.contact_us_settings';

    public function __construct()
    {
        $this->setupSettings(ContactUsSetting::class);
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
