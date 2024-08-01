<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserInformation;
use App\Models\ContactMessage; 
use App\Models\InitiativeRegistration;
use App\Models\VolunteeringRequest;
use App\Models\MailingListSubscriber;
use Illuminate\Support\Facades\Hash;

class MyAccountController extends Controller
{

    protected $data = [];

    public function __construct()
    {
        app()->setLocale('ar');
    }

    /**
     * Show the user a form to change their personal information & password.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function getAccountInfoForm()
    {
        $user = $this->guard()->user();
        $this->data['title'] = trans('backpack::base.my_account');
        $this->data['user'] = $user;
        $this->data['messageCount'] = ContactMessage::where('user_id', $user->id)->count(); 
        $this->data['initiativeCount'] = InitiativeRegistration::where('user_id', $user->id)->count(); 
        $this->data['volunteeringrequestCount'] = VolunteeringRequest::where('user_id', $user->id)->count(); 

        
        return view(backpack_view('my_account'), $this->data);
    }

    /**
     * Save the modified personal information for a user.
     */
    public function postAccountInfoForm(UpdateUserInformation $request)
    {
        $user = $this->guard()->user();
    
        $user->name = $request->input('name');
        $user->phone_number = $request->input('phone_number');
        $user->email = $request->input('email');
    
        if ($request->hasFile('profile_photo')) {
            $profilePhotoPath = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $profilePhotoPath;
        }
    
        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }
    
        $result = $user->save();
    
        if ($request->mailing_list) {
            MailingListSubscriber::firstOrCreate(['email' => $user->email]);
        } else {
            MailingListSubscriber::where('email', $user->email)->delete();
        }
    
        if ($result) {
            Alert::success(trans('backpack::base.account_updated'))->flash();
        } else {
            Alert::error(trans('backpack::base.error_saving'))->flash();
        }
    
        return redirect()->back();
    }
    
    
    /**
     * Save the new password for a user.
     */
    public function postChangePasswordForm(UpdatePasswordRequest $request)
    {
        $user = $this->guard()->user();
        $user->password = Hash::make($request->new_password);

        if ($user->save()) {
            Alert::success(trans('backpack::base.account_updated'))->flash();
        } else {
            Alert::error(trans('backpack::base.error_saving'))->flash();
        }

        // If the AuthenticateSessions middleware is being used
        // the password hash should be updated, in order to
        // invalidate all authenticated browser sessions
        // except for the current one.
        $this->guard()->logoutOtherDevices($request->new_password);

        // If the AuthenticateSession middleware was used until now,
        // also update the password hash in the session so that the
        // admin does not get logged out in the next request.
        if ($request->session()->has('password_hash_'.backpack_guard_name())) {
            $request->session()->put([
                'password_hash_'.backpack_guard_name() => $user->getAuthPassword(),
            ]);
        }

        return redirect()->back();
    }


    /**
     * Get the guard to be used for account manipulation.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return backpack_auth();
    }
}
