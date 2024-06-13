<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Initiative;
use App\Models\Partner;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\AdminController;
use Backpack\CRUD\app\Library\Widget;
use Illuminate\Http\Request;

class DashboardController extends AdminController
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function dashboard()
    {
        $numberOfUsers = User::count();
        $numberOfPartners = Partner::count();
        $numberOfInitiatives = Initiative::count();
        $numberOfSuggestionMessages = ContactMessage::suggestion()->count();
        $numberOfComplaintMessages = ContactMessage::complaint()->count();
        $numberOfInquiryMessages = ContactMessage::inquiry()->count();
        Widget::add([
            'type'       => 'chart',
            'controller' => \App\Http\Controllers\Admin\Charts\DailyUsersChartController::class,

            // OPTIONALS

             'class'   => 'card mb-2',
             'wrapper' => ['class'=> 'col-md-12 mt-4'] ,
             'content' => [
             'header' => 'الأعضاء الجدد في آخر 30 يوم',
             ],

        ])->to('after_content');
        return view(backpack_view('dashboard'), compact('numberOfUsers', 'numberOfPartners', 'numberOfInitiatives', 'numberOfSuggestionMessages', 'numberOfComplaintMessages', 'numberOfInquiryMessages'));
    }
}
