<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\LiveController;
use App\Http\Controllers\StylingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\InterestProductController;
use App\Http\Controllers\MemberBenefitController;
use App\Http\Controllers\ProfileController;
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
Route::get('/category', [HomeController::class, 'category'])->name('category');
Route::get('/styling', [StylingController::class, 'styling'])->name('styling');
Route::get('/load-more-styling', [StylingController::class, 'loadMoreStyling']);
Route::get('/detail-styling/{id}', [StylingController::class, 'detailStyling'])->name('detail-styling');
Route::get('/load-more-products-styling', [StylingController::class, 'loadMoreProducts']);
Route::get('/detail-collection/{id}', [HomeController::class, 'detailCollection'])->name('detail-collection');
Route::get('/live', [LiveController::class, 'index'])->name('live');
Route::get('/detail-product/{id}', [HomeController::class, 'detailProduct'])->name('detail-product');

//CATEGORIES
Route::get('/category/{slug}', [CategoryController::class, 'searchProductsByCategory'])->name('categories.show');

//CARTS
Route::get('getCart', [CartController::class, 'index'])->name('cart.index');
Route::post('getAttributeToCart', [CartController::class, 'getAttributeToCart'])->name('cart.getAttribute');
Route::post('getProductAttribute', [CartController::class, 'getProductAttribute'])->name('cart.getProductAttribute');
Route::post('addToCart', [CartController::class, 'addToCart'])->name('cart.store');
Route::put('updateCartQuantity', [CartController::class, 'updateCartQuantity'])->name('cart.update');
Route::delete('removeProductInCart/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::group(['prefix' => 'member', 'middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'index'])->name('auth.member.index');
    Route::post('login', [AuthController::class, 'login'])->name('auth.member.login');
    Route::post('register', [AuthController::class, 'store'])->name('auth.member.register');
});
Route::middleware('auth')->group(function () {
    Route::get('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::group(['prefix' => 'myshop'], function () {
        Route::get('', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('order', [ProfileController::class, 'order'])->name('profile.order');
        //MEMBER
        Route::get('member', [ProfileController::class, 'member'])->name('profile.member');
        Route::post('update-profile', [ProfileController::class, 'update'])->name('profile.update');
        //ADDRESS
        Route::get('address', [AddressController::class, 'address'])->name('profile.delivery.address');
        Route::get('register-address', [AddressController::class, 'create'])->name('profile.delivery.register.address');
        Route::post('register-address', [AddressController::class, 'store'])->name('profile.delivery.store.address');
        Route::get('update-address/{id}', [AddressController::class, 'show'])->name('profile.delivery.show.address');
        Route::post('update-address/{id}', [AddressController::class, 'update'])->name('profile.delivery.update.address');
        Route::delete('destroy-address/{id}', [AddressController::class, 'destroy'])->name('profile.delivery.destroy.address');
        //MEMBERSHIP
        Route::get('benefit', [MemberBenefitController::class, 'index'])->name('profile.benefit');
        //INTEREST
        Route::get('interest', [InterestProductController::class, 'index'])->name('profile.interest');
    });
    Route::post('product-interest', [InterestProductController::class, 'productInterest'])->name('product.interest');

    Route::get('logout', [AuthController::class, 'logout'])->name('auth.member.logout');
});