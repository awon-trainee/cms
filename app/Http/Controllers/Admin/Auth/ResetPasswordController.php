<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use \Backpack\CRUD\app\Http\Controllers\Auth\ResetPasswordController as BackpackResetPasswordController;

class ResetPasswordController extends BackpackResetPasswordController
{
    public function __construct()
    {
        parent::__construct();
        app()->setLocale('ar');
    }
}
