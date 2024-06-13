<?php

namespace App\Http\Controllers\Admin\Operations;

use Alert;
use App\Http\Requests\UpdateSettingsRequest;

trait SetupSettingsOperation
{

    protected function setupSettings($settings)
    {
        $this->settings = new $settings;
    }
}
