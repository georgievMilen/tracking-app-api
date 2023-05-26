<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'transactions'], function () {
    Route::get('/', [TransactionController::class, 'list']);
    Route::get('{uuid}', [TransactionController::class, 'get']);
    Route::post('/', [TransactionController::class, 'create']);
    Route::put('{uuid}', [TransactionController::class, 'update']);
    Route::delete('{uuid}', [TransactionController::class, 'delete']);
});
