<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\StylingController;
use App\Http\Controllers\Admin\VideoController;

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/dologin', [LoginController::class, 'doLogin'])->name('doLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('check-admin-auth')->group(function () {
   Route::get('', [DashboardController::class, 'index'])->name('index');
   Route::prefix('banner')->name('banner.')->group(function () {
      Route::get('', [BannerController::class, 'index'])->name('index');
      Route::get('create', [BannerController::class, 'create'])->name('create');
      Route::post('store', [BannerController::class, 'store'])->name('store');
      Route::get('edit/{id}', [BannerController::class, 'edit'])->name('edit');
      Route::post('update/{id}', [BannerController::class, 'update'])->name('update');
      Route::get('delete/{id}', [BannerController::class, 'delete'])->name('delete');
  });

  Route::prefix('video')->name('video.')->group(function () {
      Route::get('', [VideoController::class, 'index'])->name('index');
      Route::get('create', [VideoController::class, 'create'])->name('create');
      Route::post('store', [VideoController::class, 'store'])->name('store');
      Route::get('edit/{id}', [VideoController::class, 'edit'])->name('edit');
      Route::post('update/{id}', [VideoController::class, 'update'])->name('update');
      Route::get('delete/{id}', [VideoController::class, 'delete'])->name('delete');
   });

   Route::prefix('styling')->name('styling.')->group(function () {
      Route::get('', [StylingController::class, 'index'])->name('index');
      Route::get('create', [StylingController::class, 'create'])->name('create');
      Route::post('store', [StylingController::class, 'store'])->name('store');
      Route::get('edit/{id}', [StylingController::class, 'edit'])->name('edit');
      Route::post('update/{id}', [StylingController::class, 'update'])->name('update');
      Route::get('delete/{id}', [StylingController::class, 'delete'])->name('delete');
   });
});