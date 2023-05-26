<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'accounts'], function () {
    Route::get('/', [AccountController::class, 'list']);
    Route::get('{uuid}', [AccountController::class, 'get']);
    Route::post('/', [AccountController::class, 'create']);
    Route::put('{uuid}', [AccountController::class, 'update']);
    Route::delete('{uuid}', [AccountController::class, 'delete']);
});
