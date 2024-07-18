<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegulationAndPolicyController;
use App\Http\Controllers\Admin\NewGovernancePagesCrudController;
use App\Http\Controllers\NewGovernancePageController;
use App\Http\Controllers\GovernanceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([
    'namespace' => 'App\Http\Controllers'
], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/our-services', 'HomeController@ourServices')->name('our-services');
    Route::get('/executive-manager', 'HomeController@executiveManager')->name('executive-manager');
    Route::get('/about-us', 'HomeController@aboutUs')->name('about-us');

    Route::get('/board-of-directors', 'HomeController@boardOfDirectors')->name('board-of-directors');
    Route::get('/board-of-directors/{id}', 'HomeController@cvMember')->name('cv');

    Route::get('/general-assembly-members', 'HomeController@generalAssemblyMembers')->name('general-assembly-members');
    Route::get('/working-team', 'HomeController@workingTeam')->name('working-team');
    Route::get('/organizational-chart', 'HomeController@organizationalChart')->name('organizational-chart');
    Route::post('/mailing-list', 'HomeController@mailingList')->name('mailing-list');

    Route::resource('/news', 'NewsController')->only(['index', 'show']);
    Route::resource('/events', 'EventController')->only(['index', 'show']);
    Route::resource('/regulations-and-policies', 'RegulationAndPolicyController')->only(['index', 'show']);
    Route::get('/regulations-and-policies/preview/{id}', [RegulationAndPolicyController::class, 'preview'])->name('regulations-and-policies.preview');


    // Governance Routes
    Route::get('/governance', [GovernanceController::class, 'index'])->name('governance.index');
    Route::get('/governance/{id}', [GovernanceController::class, 'show'])->name('governance.show');

    // New Governance Pages Routes
    Route::get('/New_Governance_Page/preview/{id}', [NewGovernancePageController::class, 'preview'])->name('New_Governance_Page.preview');
    Route::resource('/New_Governance_Page', 'NewGovernancePageController')->only(['index', 'show']);
    Route::get('/newgovernance/download/{id}', [NewGovernancePageController::class, 'download'])->name('newgovernance.download');
    Route::get('/newgovernance/preview/{id}', [NewGovernancePageController::class, 'preview'])->name('newgovernance.preview');

    Route::resource('/operational-plans', 'OperationalPlanController')->only(['index', 'show']);
    Route::resource('/activity-reports', 'ActivityReportController')->only(['index', 'show']);
    Route::resource('/financial-reports', 'FinancialReportController')->only(['index', 'show']);
    Route::resource('/public-records', 'PublicRecordController')->only(['index', 'show']);
    Route::resource('/disclosure-and-transparency', 'DisclosureAndTransparencyController')->only(['index', 'show']);
    Route::resource('/other-governance', 'OtherGovernanceController')->only(['index', 'show']);
    Route::resource('/membership', 'MembershipController')->only(['index', 'store']);
    Route::resource('/employment', 'EmploymentController')->only(['index', 'store']);
    Route::resource('/volunteering', 'VolunteeringController')->only(['index', 'store']);
    Route::resource('/our-initiatives', 'OurInitiativeController')->only(['index', 'store']);
    Route::resource('/contact-us', 'ContactUsController')->only(['index', 'store']);

    Route::get('pictures', 'PictureController@index')->name('pictures.index');
    Route::get('videos', 'VideoLibraryController@index')->name('videos.index');
});
