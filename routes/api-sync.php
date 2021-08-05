<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Sync Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['cors', 'jwt.auth', 'api']], function () {

    Route::post(
        'course/syncOfConnect',
        'Management\CourseController@syncOfConnect'
    );
    Route::post(
        'student/syncOfConnect',
        'Admin\UserController@syncOfConnect'
    );
    Route::post(
        'delivery/syncOfConnect',
        'Management\DeliveryController@syncOfConnect'
    );
    Route::post(
        'rubric/syncOfConnect',
        'Management\ScoreController@syncOfConnect'
    );
    Route::post(
        'files/syncOfConnect',
        'Management\DeliveryController@fileSyncOfConnect'
    );
});
