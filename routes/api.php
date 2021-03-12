<?php

use Illuminate\Http\Request;
use App\Http\Auth\API as ApiControllers;
use App\Http\User\API as UserControllers;
use Illuminate\Support\Facades\Route;
use App\Http\Auth\Mobile\Controllers as AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => ApiControllers::class], function() {
    Route::post('login', 'LoginApiController@login');
});

Route::middleware('auth:api')->group(function () {
    Route::group(['namespace' => UserControllers::class], function() {
        Route::get('user', 'UserApiController@getUserData');
    });
});
