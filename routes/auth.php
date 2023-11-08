<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('register', [LoginController::class, 'register'])->name('register');

Route::group(['middleware' => ['auth:api']], function () {
   Route::post('logout', [LoginController::class, 'logout']);
});
