<?php

use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CollectionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FooterBlogController;
use App\Http\Controllers\Admin\LiveController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductCollectionController;
use App\Http\Controllers\Admin\StylingController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\FooterCategory;

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
      Route::post('delete-img', [StylingController::class, 'deleteImg'])->name('delete-img');
      Route::get('item_product/search', [StylingController::class, 'productSearch']);
      Route::get('item_product', [StylingController::class, 'itemProduct']);
      Route::get('item_product/delete', [StylingController::class, 'itemDeleteProduct']);
      Route::get('item_product/delete_related', [StylingController::class, 'itemDeleteRelated']);
   });

   Route::prefix('advertisement')->name('advertisement.')->group(function () {
      Route::get('', [AdvertisementController::class, 'index'])->name('index');
      Route::get('create', [AdvertisementController::class, 'create'])->name('create');
      Route::post('store', [AdvertisementController::class, 'store'])->name('store');
      Route::get('edit/{id}', [AdvertisementController::class, 'edit'])->name('edit');
      Route::post('update/{id}', [AdvertisementController::class, 'update'])->name('update');
      Route::get('delete/{id}', [AdvertisementController::class, 'delete'])->name('delete');
      Route::get('item_product/search', [AdvertisementController::class, 'productSearch']);
      Route::get('item_product', [AdvertisementController::class, 'itemProduct']);
      Route::get('item_product/delete', [AdvertisementController::class, 'itemDeleteProduct']);
      Route::get('item_product/delete_related', [AdvertisementController::class, 'itemDeleteRelated']);
   });

   Route::prefix('album')->name('album.')->group(function () {
      Route::get('', [AlbumController::class, 'index'])->name('index');
      Route::get('create', [AlbumController::class, 'create'])->name('create');
      Route::post('store', [AlbumController::class, 'store'])->name('store');
      Route::get('edit/{id}', [AlbumController::class, 'edit'])->name('edit');
      Route::post('update/{id}', [AlbumController::class, 'update'])->name('update');
      Route::get('delete/{id}', [AlbumController::class, 'delete'])->name('delete');
   });

   Route::prefix('collection')->name('collection.')->group(function () {
      Route::get('', [CollectionController::class, 'index'])->name('index');
      Route::get('create', [CollectionController::class, 'create'])->name('create');
      Route::post('store', [CollectionController::class, 'store'])->name('store');
      Route::get('edit/{id}', [CollectionController::class, 'edit'])->name('edit');
      Route::post('update/{id}', [CollectionController::class, 'update'])->name('update');
      Route::get('delete/{id}', [CollectionController::class, 'delete'])->name('delete');
   });

   Route::prefix('product-collection')->name('product-collection.')->group(function () {
      Route::get('index/{status}', [ProductCollectionController::class, 'index'])->name('index');
      Route::get('create', [ProductCollectionController::class, 'create'])->name('create');
      Route::post('store', [ProductCollectionController::class, 'store'])->name('store');
      Route::get('delete/{id}', [ProductCollectionController::class, 'delete'])->name('delete');
      Route::get('item_product/search', [ProductCollectionController::class, 'productSearch']);
      Route::get('item_product', [ProductCollectionController::class, 'itemProduct']);
      Route::get('item_product/delete', [ProductCollectionController::class, 'itemDeleteProduct']);
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

   //CATEGORY
   Route::get('category', [CategoryController::class, 'index'])->name('category.index');
   Route::post('store-category', [CategoryController::class, 'store'])->name('category.store');
   Route::put('update-category/{id}', [CategoryController::class, 'update'])->name('category.update');
   Route::delete('destroy-category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

   //PRODUCT
   Route::get('product', [ProductController::class, 'index'])->name('product.index');
   Route::get('create-product', [ProductController::class, 'create'])->name('product.create');
   Route::post('store-product', [ProductController::class, 'store'])->name('product.store');
   Route::get('edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
   Route::put('update-product/{id}', [ProductController::class, 'update'])->name('product.update');
   Route::delete('destroy-product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
   Route::post('attribute-type', [ProductController::class, 'attributeType']);
   Route::post('attribute-name', [ProductController::class, 'attributeName']);
   Route::get('product/delete-type/{id}', [ProductController::class, 'deleteType']);
   Route::get('product/delete-name/{id}', [ProductController::class, 'deleteName']);

   //ORDER
   Route::get('order', [OrderController::class, 'index'])->name('order.index');
   Route::get('edit-order/{id}', [OrderController::class, 'edit'])->name('order.edit');
   Route::put('update-order/{id}', [OrderController::class, 'update'])->name('order.update');
   Route::delete('destroy-order/{id}', [OrderController::class, 'destroy'])->name('order.destroy');

   //FOOTER
   Route::get('footer-category', [FooterCategory::class, 'index'])->name('footer.category.index');
   Route::post('footer-store-category', [FooterCategory::class, 'store'])->name('footer.category.store');
   Route::put('footer-update-category/{id}', [FooterCategory::class, 'update'])->name('footer.category.update');
   Route::delete('footer-destroy-category/{id}', [FooterCategory::class, 'destroy'])->name('footer.category.destroy');
   //BLOG
   Route::get('footer-blog', [FooterBlogController::class, 'index'])->name('footer.blog.index');
   Route::get('create-footer-blog', [FooterBlogController::class, 'create'])->name('footer.blog.create');
   Route::post('store-footer-blog', [FooterBlogController::class, 'store'])->name('footer.blog.store');
   Route::get('edit-footer-blog/{id}', [FooterBlogController::class, 'edit'])->name('footer.blog.edit');
   Route::put('update-footer-blog/{id}', [FooterBlogController::class, 'update'])->name('footer.blog.update');
   Route::delete('destroy-footer-blog/{id}', [FooterBlogController::class, 'destroy'])->name('footer.blog.destroy');
   //Post showroom
   Route::get('post-showroom', [FooterBlogController::class, 'postShowroom'])->name('post.showroom');
   Route::post('save-showroom', [FooterBlogController::class, 'saveShowroom'])->name('save.showroom');
   //Post brand
   Route::get('post-brand', [FooterBlogController::class, 'postBrand'])->name('post.brand');
   Route::post('save-brand', [FooterBlogController::class, 'saveBrand'])->name('save.brand');
});
Route::post('ckeditor/upload', [DashboardController::class, 'upload'])->name('ckeditor.image-upload');