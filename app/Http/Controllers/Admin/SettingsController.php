<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateSettingsRequest;
use Illuminate\Routing\Controller;

abstract class SettingsController extends Controller
{
    protected string $title = 'MISSING_TITLE';

    protected string $route = 'home';

    abstract public function __construct();

    abstract public function index();

    abstract public function edit();

    abstract public function update(UpdateSettingsRequest $request);

    abstract protected function setupSettings($settings);

    abstract protected function setupSettingsRequest();

    abstract protected function setupEditSettingsOperation();

    abstract protected function setupListSettingsOperation();
}
