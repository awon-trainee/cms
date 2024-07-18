<?php
namespace App\Providers;

use App\Models\Page;
use App\Models\Governance;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        \View::composer('*', function ($view) {
            $generalSettings = new \App\Settings\GeneralSettings;
            $contactUsSettings = new \App\Settings\ContactUsSetting;
            $pages = Page::all(['name_ar', 'name_en'])->pluck('name_ar', 'name_en')->toArray();
            $governances = Governance::all(); // Fetch all governance items
          

            $view->with('generalSettings', $generalSettings);
            $view->with('logo', config('filesystems.disks.digitalocean.url').'/'.$generalSettings::IMAGE_VIEW_PATH.$generalSettings->charity_logo);
            $view->with('social', [
                'twitter' => $generalSettings->twitter_account,
                'snapchat' => $generalSettings->snapchat_account,
                'instagram' => $generalSettings->instagram_account,
                'youtube' => $generalSettings->youtube_account,
                'whatsapp' => $generalSettings->whatsapp_account,
                'linkedin' => $generalSettings->linkedin_account,
                'facebook' => $generalSettings->facebook_account,
                'tictok' => $generalSettings->tictok_account,
                'telegram' => $generalSettings->telegram_account,
                'google_maps_location' => $generalSettings->google_maps_location,
            ]);
            $view->with('pages', $pages);
            $view->with('governances', $governances); // Add the governance data
            $view->with('contactUsSettings', $contactUsSettings);

            if (!auth()->check()) {
                app()->setLocale('ar');
            }
        });

        if (request()->segment(1) != config('backpack.base.route_prefix')) {
            app()->setLocale('ar');
        }

        $this->app->bind(
            \Backpack\PermissionManager\app\Http\Controllers\UserCrudController::class, //this is package controller
            \App\Http\Controllers\Admin\UserCrudController::class //this should be your own controller
        );

        $this->app->bind(
            \Backpack\CRUD\app\Http\Controllers\AdminController::class,
            \App\Http\Controllers\Admin\DashboardController::class
        );

        $this->app->bind(
            \Backpack\CRUD\app\Http\Controllers\MyAccountController::class,
            \App\Http\Controllers\MyAccountController::class
        );

        $this->app->bind(
            \Backpack\CRUD\app\Http\Controllers\Auth\RegisterController::class,
            \App\Http\Controllers\Admin\Auth\RegisterController::class
        );

        $this->app->bind(
            \Backpack\CRUD\app\Http\Controllers\Auth\LoginController::class,
            \App\Http\Controllers\Admin\Auth\LoginController::class
        );

        $this->app->bind(
            \Backpack\CRUD\app\Http\Controllers\Auth\ForgotPasswordController::class,
            \App\Http\Controllers\Admin\Auth\ForgotPasswordController::class
        );

        $this->app->bind(
            \Backpack\CRUD\app\Http\Controllers\Auth\ResetPasswordController::class,
            \App\Http\Controllers\Admin\Auth\ResetPasswordController::class
        );
    }
}
