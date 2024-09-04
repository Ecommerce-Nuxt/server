<?php

use App\Http\Controllers\Api\Admin\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('admin')->group(function () {
    Route::post('/login', [LoginController::class, 'index', ['as' => 'admin']]);

    Route::group(['middleware' => 'auth:api_admin'], function ()
    {
        // * data user
        Route::get('/user', [LoginController::class, 'getUser', ['as' => 'admin']]);

        // * refresh token jwt
        Route::get('/refresh', [LoginController::class, 'refreshToken', ['as' => 'admin']]);

        // * logout
        Route::post('/logout', [LoginController::class, 'logout', ['as' => 'admin']]);
    });
});

