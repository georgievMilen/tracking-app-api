<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('categories', [CategoryController::class, 'list']);
Route::get('categories/{uuid}', [CategoryController::class, 'get']);
Route::post('categories/', [CategoryController::class, 'create']);
Route::put('categories/{uuid}', [CategoryController::class, 'update']);
Route::delete('categories/{uuid}', [CategoryController::class, 'delete']);

