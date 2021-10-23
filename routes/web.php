<?php

use App\Http\Controllers\Backend\AuthController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin routes

Route::get('backend/login', [AuthController::class, 'showLoginForm']);
Route::post('backend/login', [AuthController::class, 'login'])->name("backend.login");

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/backend', function () {
        return 'this is admin backend. admin only';
    });
});
