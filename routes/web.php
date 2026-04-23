<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;


// authentication routes
Route::get('/login', function () {
    return view('frontend.auth.login');
})->name('login');
Route::get('/register', function () {
    return view('frontend.auth.register');
})->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');






Route::get('/',[ProductController::class,'home'] )->name('home');
// search
Route::get('/search', [ProductController::class, 'search'])->name('search');
// products
Route::get('/products',[ProductController::class,'index'])->name('products');
Route::get('/products/top-rated',[ProductController::class,'topRated'])->name('products.topRated');
Route::get('/products/new-arrivals',[ProductController::class,'newArrivals'])->name('products.newArrivals');
Route::get('/products/filters',[ProductController::class, 'render'])->name('products.render');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/related/{slug}', [ProductController::class, 'relatedProducts'])->name('products.relatedProducts');
// submit review
Route::post('/products/review/{slug}', [ProductController::class, 'submitReview'])->name('products.submitReview');
Route::get('/products/{slug}/{data}', [ProductController::class, 'aboutProuct'])->name('products.aboutProduct');
// categories
Route::get('/categories',[ProductController::class, 'categories'])->name('categories');
// add to cart
Route::post('/cart/add', [ProductController::class, 'addToCart'])->name('cart.add');

// products in cart
Route::get('/cart',[ProductController::class,'viewCart'])->name('cart');
Route::get('/cart-data', [ProductController::class, 'viewCartData'])->name('cart.cartData');
Route::post('/cart/remove-item/{id}', [ProductController::class, 'destroyCart'])->name('cart.destroyCart');
Route::get('/proceed-data', [ProductController::class, 'viewProceedData'])->name('cart.ProceedData');
// update cart qty
Route::get('/cart/updateQty', [ProductController::class, 'updateQty'])->name('cart.updateQty');
// remove from cart


// order
Route::post('/order/submit/{id}',[ProductController::class,'orderSubmit'])->name('orderSubmit');
// update qty in order


