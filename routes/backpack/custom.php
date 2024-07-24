<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.
Route::group(['middleware' => [config('backpack.base.web_middleware', 'web')]], function () {
    //routes here
    Route::group(['middleware' => ['auth']], function () {
        Route::get('edit-account-info', 'App\Http\Controllers\MyAccountController@getAccountInfoForm')->name('backpack.account.info');
        Route::post('edit-account-info', 'App\Http\Controllers\MyAccountController@postAccountInfoForm')->name('backpack.account.info.store');
        Route::post('change-password', 'App\Http\Controllers\MyAccountController@postChangePasswordForm')->name('backpack.account.password');
    });
});

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::get('home-page', 'HomeSettingsController@index')->name('page.home_page.index');
    Route::get('home-page/edit', 'HomeSettingsController@edit')->name('page.home_page.edit');
    Route::put('home-page', 'HomeSettingsController@update')->name('page.home_page.update');

    Route::get('general-settings', 'GeneralSettingsController@index')->name('page.general_settings.index');
    Route::get('general-settings/edit', 'GeneralSettingsController@edit')->name('page.general_settings.edit');
    Route::put('general-settings', 'GeneralSettingsController@update')->name('page.general_settings.update');

    Route::crud('home-ad', 'HomeAdCrudController');

    Route::crud('home-statistic', 'HomeStatisticCrudController');

    Route::crud('partner', 'PartnerCrudController');

    Route::crud('service', 'ServiceCrudController');

    Route::crud('value', 'ValueCrudController');

    Route::crud('field', 'FieldCrudController');

    Route::get('about-us-settings', 'AboutUsSettingsController@index')->name('page.about_us_settings.index');
    Route::get('about-us-settings/edit', 'AboutUsSettingsController@edit')->name('page.about_us_settings.edit');
    Route::put('about-us-settings', 'AboutUsSettingsController@update')->name('page.about_us_settings.update');

    Route::get('contact-us-settings', 'ContactUsSettingsController@index')->name('page.contact_us_settings.index');
    Route::get('contact-us-settings/edit', 'ContactUsSettingsController@edit')->name('page.contact_us_settings.edit');
    Route::put('contact-us-settings', 'ContactUsSettingsController@update')->name('page.contact_us_settings.update');

    Route::crud('position', 'PositionCrudController');

    Route::crud('board-member', 'BoardMemberCrudController');

    Route::crud('general-assembly-member', 'GeneralAssemblyMemberCrudController');

    Route::crud('charity-team-member', 'CharityTeamMemberCrudController');

    Route::get('organizational-structure-settings', 'OrganizationalStructureSettingsController@index')->name('page.organizational_structure_settings.index');
    Route::get('organizational-structure-settings/edit', 'OrganizationalStructureSettingsController@edit')->name('page.organizational_structure_settings.edit');
    Route::put('organizational-structure-settings', 'OrganizationalStructureSettingsController@update')->name('page.organizational_structure_settings.update');

    Route::crud('initiative', 'InitiativeCrudController');
    Route::get('initiative/export', 'InitiativeCrudController@export')->name('initiative.export');

    Route::crud('news', 'NewsCrudController');

    Route::crud('event', 'EventCrudController');


    Route::crud('picture', 'PictureCrudController');

    Route::crud('regulation', 'RegulationCrudController');

    Route::crud('operational-plan', 'OperationalPlanCrudController');

    Route::crud('activity-report', 'ActivityReportCrudController');

    Route::crud('financial-report', 'FinancialReportCrudController');

    Route::crud('public-record', 'PublicRecordCrudController');

    Route::crud('transparency', 'TransparencyCrudController');

    Route::crud('other-governance', 'OtherGovernanceCrudController');

    Route::get('employment-page', 'EmploymentSettingsController@index')->name('page.employment_page.index');
    Route::get('employment-page/edit', 'EmploymentSettingsController@edit')->name('page.employment_page.edit');
    Route::put('employment-page', 'EmploymentSettingsController@update')->name('page.employment_page.update');

    Route::get('membership-page', 'MembershipSettingsController@index')->name('page.membership_page.index');
    Route::get('membership-page/edit', 'MembershipSettingsController@edit')->name('page.membership_page.edit');
    Route::put('membership-page', 'MembershipSettingsController@update')->name('page.membership_page.update');

    Route::get('volunteering-page', 'VolunteeringSettingsController@index')->name('page.volunteering_page.index');
    Route::get('volunteering-page/edit', 'VolunteeringSettingsController@edit')->name('page.volunteering_page.edit');
    Route::put('volunteering-page', 'VolunteeringSettingsController@update')->name('page.volunteering_page.update');

    Route::crud('employment-request', 'EmploymentRequestCrudController');
    Route::get('employment-request/export', 'EmploymentRequestCrudController@export')->name('employment-requests.export');

    Route::crud('membership-request', 'MembershipRequestCrudController');
    Route::get('membership-request/export', 'MembershipRequestCrudController@export')->name('membership-requests.export');

    Route::crud('volunteering-request', 'VolunteeringRequestCrudController');
    Route::get('volunteering-request/export', 'VolunteeringRequestCrudController@export')->name('volunteer-requests.export');

    Route::crud('initiative-registration', 'InitiativeRegistrationCrudController');
    Route::get('initiative-registration/export', 'InitiativeRegistrationCrudController@export')->name('initiative-registration.export');

    Route::crud('user', 'UserCrudController');
    Route::get('user/export', 'UserCrudController@export')->name('user.export');

    Route::crud('contact-message', 'ContactMessageCrudController');
    Route::get('contact-message/{id}/mark-as-read', 'ContactMessageCrudController@markAsRead')->name('contact-message.mark-as-read');
    Route::get('contact-message/{id}/mark-as-unread', 'ContactMessageCrudController@markAsUnread')->name('contact-message.mark-as-unread');
    Route::get('contact-message/mark-all-as-read', 'ContactMessageCrudController@markAllAsRead')->name('contact-message.mark-all-as-read');
    Route::get('contact-message/export', 'ContactMessageCrudController@export')->name('contact-message.export');

    Route::get('charts/daily-users', 'Charts\DailyUsersChartController@response')->name('charts.weekly-users.index');

    Route::crud('mailing-list-subscriber', 'MailingListSubscriberCrudController');
    Route::get('mailing-list-subscriber/export', 'MailingListSubscriberCrudController@export')->name('mailing-list-subscriber.export');
    Route::crud('questionnaires', 'QuestionnairesCrudController');
    Route::crud('page', 'PageCrudController');
    Route::crud('qualification', 'QualificationCrudController');
    Route::crud('experiance', 'ExperianceCrudController');
    Route::crud('projects', 'ProjectsCrudController');
    Route::crud('employment-opportunity', 'EmploymentOpportunityCrudController');
    Route::crud('volunteer-opportunity', 'VolunteerOpportunityCrudController');
    Route::crud('membership-opportunity', 'MembershipOpportunityCrudController');
    Route::crud('banks', 'BanksCrudController');
    Route::crud('video-library', 'VideoLibraryCrudController');
    Route::crud('faq', 'FaqCrudController');
    Route::crud('footer-links', 'FooterLinksCrudController');
    Route::crud('governance', 'GovernanceCrudController');
    Route::crud('newgovernance', 'NewGovernanceCrudController');
    Route::crud('ceo', 'CeoCrudController');
}); // this should be the absolute last line of this file