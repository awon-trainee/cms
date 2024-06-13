<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Operations\ListSettingsOperation;
use App\Http\Controllers\Admin\Operations\SetupSettingsOperation;
use App\Http\Controllers\Admin\Operations\UpdateSettingsOperation;
use App\Settings\AboutUsPageSettings;
use App\Settings\GeneralSettings;
use Illuminate\Routing\Controller;

/**
 * Class AboutUsSettingsController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AboutUsSettingsController extends SettingsController
{
    use SetupSettingsOperation, ListSettingsOperation, UpdateSettingsOperation;

    protected $settings;

    protected string $title = 'إعدادات صفحة عن الجمعية';

    protected string $route = 'page.about_us_settings';

    public function __construct()
    {
        $this->setupSettings(AboutUsPageSettings::class);
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
