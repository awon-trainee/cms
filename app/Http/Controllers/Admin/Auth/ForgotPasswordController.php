<?php

namespace App\Http\Controllers\Admin\Auth;

use Backpack\CRUD\app\Http\Controllers\Auth\ForgotPasswordController as BackpackForgotPasswordController;
use Illuminate\Auth\Passwords\PasswordBrokerManager;

class ForgotPasswordController extends BackpackForgotPasswordController
{
    public function __construct()
    {
        parent::__construct();
        app()->setLocale('ar');
    }



    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        $passwords = config('backpack.base.passwords', config('auth.defaults.passwords'));
        $manager = new PasswordBrokerManager(app());

        return $manager->broker($passwords);
    }
}
