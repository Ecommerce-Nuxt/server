<?php

use App\Http\Controllers\Api\Admin\CategoryController;
use App\Http\Controllers\Api\Admin\DashbardController;
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
    Route::post('/login', [LoginController::class, 'index', ['as' => 'admin.login']]);

    Route::group(['middleware' => 'auth:api_admin'], function ()
    {
        // * data user
        Route::get('/user', [LoginController::class, 'getUser', ['as' => 'admin.getUser']]);

        // * refresh token jwt
        Route::get('/refresh', [LoginController::class, 'refreshToken', ['as' => 'admin.refresh']]);

        // * logout
        Route::post('/logout', [LoginController::class, 'logout', ['as' => 'admin.logout']]);

        // * dashboard
        Route::get('/dashboard', [DashbardController::class, 'index', ['as' => 'admin.dashboard']] );

        // * categories resource
        Route::resource('/categories', CategoryController::class, ['except' => ['create','edit'], 'as' => 'admin']);
    });
});

