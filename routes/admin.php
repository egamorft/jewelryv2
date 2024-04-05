<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LiveController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\LoginController;

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/dologin', [LoginController::class, 'doLogin'])->name('doLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('check-admin-auth')->group(function () {
   Route::get('', [DashboardController::class, 'index'])->name('index');
   //LIVE
   Route::get('live-content', [LiveController::class, 'content'])->name('live.content');
   Route::post('save-live-content', [LiveController::class, 'saveContent'])->name('live.save.content');
   Route::get('live-video', [LiveController::class, 'video'])->name('live.video.list');
   Route::get('create-video', [LiveController::class, 'create'])->name('live.video.create');
   Route::post('create-video', [LiveController::class, 'store'])->name('live.video.store');
   Route::get('show-video/{id}', [LiveController::class, 'show'])->name('live.video.show');
   Route::put('update-video/{id}', [LiveController::class, 'update'])->name('live.video.update');
   Route::delete('destroy-video/{id}', [LiveController::class, 'destroy'])->name('live.video.destroy');
   //CATEGORY
   Route::get('category', [CategoryController::class, 'index'])->name('category.index');
   Route::get('store-category', [CategoryController::class, 'create'])->name('category.create');
   Route::post('store-category', [CategoryController::class, 'store'])->name('category.store');
   Route::get('update-category', [CategoryController::class, 'edit'])->name('category.edit');
   Route::put('update-category', [CategoryController::class, 'update'])->name('category.update');
   Route::delete('destroy-category', [CategoryController::class, 'destroy'])->name('category.destroy');
});