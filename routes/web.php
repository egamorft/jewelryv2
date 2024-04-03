<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::middleware(['guest'])->group(function () {
    Route::group(['prefix' => 'member'], function () {
        Route::get('login', [AuthController::class, 'index'])->name('auth.member.index');
        Route::post('login', [AuthController::class, 'login'])->name('auth.member.login');
        Route::post('register', [AuthController::class, 'store'])->name('auth.member.register');
    });
});

Route::get('logout', [AuthController::class, 'logout'])->name('auth.member.logout');