<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Operations\ListSettingsOperation;
use App\Http\Controllers\Admin\Operations\SetupSettingsOperation;
use App\Http\Controllers\Admin\Operations\UpdateSettingsOperation;
use App\Settings\HomePageSettings;
use App\Settings\VolunteeringSettings;

/**
 * Class HomeSettingsController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class VolunteeringSettingsController extends SettingsController
{
    use SetupSettingsOperation, ListSettingsOperation, UpdateSettingsOperation;

    protected VolunteeringSettings $settings;

    protected string $title = 'إعدادات صفحة التطوع';

    protected string $route = 'page.volunteering_page';

    public function __construct()
    {
        $this->setupSettings(VolunteeringSettings::class);
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
