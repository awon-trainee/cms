<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Operations\ListSettingsOperation;
use App\Http\Controllers\Admin\Operations\SetupSettingsOperation;
use App\Http\Controllers\Admin\Operations\UpdateSettingsOperation;
use App\Settings\OrganizationalStructureSettings;
use Illuminate\Routing\Controller;

/**
 * Class OrganizationalStructureSettingsController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OrganizationalStructureSettingsController extends Controller
{
    use SetupSettingsOperation, ListSettingsOperation, UpdateSettingsOperation;

    protected $settings;

    protected string $title = 'إعدادات الهيكل التنظيمي';

    protected string $route = 'page.organizational_structure_settings';

    public function __construct()
    {
        $this->setupSettings(OrganizationalStructureSettings::class);
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
