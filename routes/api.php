<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\FileUploadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'v1/'], function () {
    Route::group(['prefix' => 'campaigns'], function () {
        Route::controller(CampaignController::class)->group(function () {
            Route::get('list/all', 'index');
            Route::post('save', 'store');
        });
    });

    Route::group(['prefix' => 'files'], function () {
        Route::controller(FileUploadController::class)->group(function () {
            Route::post('save', '__invoke');
        });
    });
});
