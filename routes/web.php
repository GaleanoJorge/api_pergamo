<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'IndexController')->name('index');
Route::post('forgot', 'Auth\ForgotController');

Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')
    ->name('password.showResetForm');



Route::get('home', 'Auth\ResetPasswordController@home')->name('home');

Route::group(['middleware' => ['cors'], 'prefix' => 'api/public'], function () {
    Route::get('course/forInscription', 'Management\CourseController@forInscription');
    Route::get('module/allByCourse/{courseId}', 'Management\ModuleController@getByCourse');

    Route::get('getUserAuxiliaryData', 'Admin\UserController@getAuxiliaryData');
    Route::get('region', 'Management\RegionController@index');
    Route::get('municipality', 'Management\MunicipalityController@index');
    Route::get('circuit', 'Management\CircuitController@index');
    Route::get('district', 'Management\DistrictController@index');
    Route::get('user/{id}', 'Admin\UserController@show');
    Route::post('userInscription', 'Admin\UserController@store');
    Route::post('userInscription/{id}', 'Admin\UserController@update');
    Route::get('sessionQRCode/{idSession}/{idURG}', 'Management\SessionController@ShowSessionQRCode');
    Route::apiResource('assistanceSessionP', 'Management\AssistanceSessionController');
    Route::get('showByUserRoleGroup/{idSession}/{idURG}', 'Management\AssistanceSessionController@showByUserRoleGroup');

    Route::post('password/reset', 'Auth\ResetPasswordController@reset')
        ->name('password.update');
});
