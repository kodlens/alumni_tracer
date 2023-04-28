<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//GET, POST
// Route::get('/test', function () {
//    return 'Hi i am test route';
// });




Auth::routes();
//For client
Route::get('/home', [App\Http\Controllers\Client\HomeController::class, 'index'])->name('home');
Route::get('/ajax-get-newsfeeds', [App\Http\Controllers\Client\HomeController::class, 'getNewsFeeds']);



//For client register
Route::resource('/registration-page', App\Http\Controllers\Client\RegistrationPageController::class);

//client profile
Route::get('/profile-page', [App\Http\Controllers\Client\ProfilePageController::class, 'index']);


Route::post('/profile-information', [App\Http\Controllers\Client\ProfilePageController::class, 'updateMyInfo']);
Route::post('/profile-education', [App\Http\Controllers\Client\ProfilePageController::class, 'storeEducation']);
Route::post('/profile-eligibility', [App\Http\Controllers\Client\ProfilePageController::class, 'storeEligibility']);
Route::post('/profile-information-address', [App\Http\Controllers\Client\ProfilePageController::class, 'storeAddress']);
Route::post('/profile-employment', [App\Http\Controllers\Client\ProfilePageController::class, 'storeEmployment']);

//change password
Route::resource('/account-panel', App\Http\Controllers\Client\ChangePasswordController::class);

//ajax
Route::get('/ajax-profile-page', [App\Http\Controllers\Client\ProfilePageController::class, 'getProfile']);
Route::get('/ajax-get-education', [App\Http\Controllers\Client\ProfilePageController::class, 'getEducation']);
Route::get('/ajax-get-eligibility', [App\Http\Controllers\Client\ProfilePageController::class, 'getEligibility']);
Route::get('/ajax-get-information-address', [App\Http\Controllers\Client\ProfilePageController::class, 'getAddress']);
Route::get('/ajax-profile-employment', [App\Http\Controllers\Client\ProfilePageController::class, 'getEmployment']);


//For Admin
Route::get('/panel', [App\Http\Controllers\Panel\PanelHomeController::class, 'index']);


//News Feed
Route::resource('/panel/news-feed', App\Http\Controllers\Panel\NewsFeedController::class);
Route::get('/panel/ajax-get-newsfeeds', [App\Http\Controllers\Panel\NewsFeedController::class, 'index_data']);


//Course List
Route::resource('/panel/program-list', App\Http\Controllers\Panel\ProgramListController::class);
Route::get('/panel/ajax-get-program-list', [App\Http\Controllers\Panel\ProgramListController::class, 'index_data']);


//For User List
Route::resource('/panel/user-page', App\Http\Controllers\Panel\UserPageController::class);
Route::post('/panel/user-page-post/{id}', [App\Http\Controllers\Panel\UserPageController::class, 'updateWithImage']); //upload image with update
Route::get('/ajax-user-page', [App\Http\Controllers\Panel\UserPageController::class, 'indexData']);

Route::put('/panel/user-reset-password/{id}', [App\Http\Controllers\Panel\UserPageController::class, 'resetPassword']);



//Edit and Update for Education
Route::resource('/panel/education-page', App\Http\Controllers\Panel\EducationalInformationController::class);
Route::get('/ajax-education-page', [App\Http\Controllers\Panel\EducationalInformationController::class, 'index']);
Route::get('/panel/user-education-page/{id}', [App\Http\Controllers\Panel\EducationalInformationController::class, 'getEducations']);



//Edit and Update for Eligibility
Route::resource('/panel/eligibility-page', App\Http\Controllers\Panel\EligibilityController::class);
Route::get('/ajax-eligibility-page', [App\Http\Controllers\Panel\EligibilityController::class, 'index']);
Route::get('/panel/user-eligibility-page/{id}', [App\Http\Controllers\Panel\EligibilityController::class, 'getEligibilities']);


//address
Route::resource('/panel/address-page', App\Http\Controllers\Panel\AddressesController::class);
Route::get('/ajax-address-page', [App\Http\Controllers\Panel\AddressesController::class, 'indexData']);


//employment
Route::resource('/panel/employment-page', App\Http\Controllers\Panel\EmploymentController::class);
Route::get('/ajax-employment-page', [App\Http\Controllers\Panel\EmploymentController::class, 'indexData']);


//REPORT
Route::resource('/report-program', App\Http\Controllers\Panel\ReportProgramController::class);
Route::get('/axios-users', [App\Http\Controllers\Panel\ReportProgramController::class, 'userByProgram']);


//For Log-out
 Route::get('/app/logout', function () {
     return view('mylogout');
 });

Route::resource('/dashboard', App\Http\Controllers\DashboardController::class);
