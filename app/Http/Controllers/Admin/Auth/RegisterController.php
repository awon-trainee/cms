<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Backpack\CRUD\app\Http\Controllers\Auth\RegisterController as BackpackRegisterController;
use Illuminate\Support\Facades\Validator;

class RegisterController extends BackpackRegisterController
{
    public function __construct()
    {
        parent::__construct();
        app()->setLocale('ar');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $user_model_fqn = config('backpack.base.user_model_fqn');
        $user = new $user_model_fqn();
        $users_table = $user->getTable();
        $email_validation = backpack_authentication_column() == 'email' ? 'email|' : '';
    
        return Validator::make($data, [
            'name'                             => 'required|max:255|min:3',
            'phone_number'                     => 'required|digits:9|starts_with:5|unique:'.$users_table,
            backpack_authentication_column()   => 'required|'.$email_validation.'max:255|unique:'.$users_table,
            'password'                         => 'required|min:6|confirmed',
            'profile_photo'                    => 'nullable|image|max:2048', // Add this line
        ]);
    }
    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return User
     */
    protected function create(array $data)
    {
        $user_model_fqn = config('backpack.base.user_model_fqn');
        $user = new $user_model_fqn();
    
        // Handle profile photo upload
        if (request()->hasFile('profile_photo') && request()->file('profile_photo')->isValid()) {
            $profilePhotoPath = request()->file('profile_photo')->store('profile_photos', 'public');
            $data['profile_photo'] = $profilePhotoPath;
        } else {
            $data['profile_photo'] = null;
        }
    
        return $user->create([
            'name'                             => $data['name'],
            'phone_number'                     => $data['phone_number'],
            backpack_authentication_column()   => $data[backpack_authentication_column()],
            'password'                         => bcrypt($data['password']),
            'profile_photo'                    => $data['profile_photo'], // Save the profile photo path
        ])?->assignRole('Visitor');
    }
    
}
