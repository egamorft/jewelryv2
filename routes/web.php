<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Web\HomeController;

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
Route::get('/danh-muc', [HomeController::class, 'category'])->name('category');
Route::get('/styling', [HomeController::class, 'styling'])->name('styling');
Route::get('/detail-styling', [HomeController::class, 'detailStyling'])->name('detail-styling');

Route::middleware(['guest'])->group(function () {
    Route::group(['prefix' => 'member'], function () {
        Route::get('login', [AuthController::class, 'index'])->name('auth.member.login');
    });
});