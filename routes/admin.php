<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LiveController;
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
   //LIVE
   Route::get('live-content', [LiveController::class, 'content'])->name('live.content');
   Route::post('save-live-content', [LiveController::class, 'saveContent'])->name('live.save.content');
   Route::get('live-video', [LiveController::class, 'video'])->name('live.video.list');
   Route::get('create-video', [LiveController::class, 'create'])->name('live.video.create');
   Route::post('create-video', [LiveController::class, 'store'])->name('live.video.store');
   Route::get('show-video/{id}', [LiveController::class, 'show'])->name('live.video.show');
   Route::put('update-video/{id}', [LiveController::class, 'update'])->name('live.video.update');
   Route::delete('destroy-video/{id}', [LiveController::class, 'destroy'])->name('live.video.destroy');
});