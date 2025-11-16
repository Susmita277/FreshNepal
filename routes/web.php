<?php

use App\Livewire\Checkout;
use App\Livewire\Home;
use App\Livewire\Cart;
use App\Livewire\OrderDetails;
use App\Livewire\Product;
use App\Livewire\ProductDetail;
use App\Livewire\Register;
use App\Livewire\Login;
use App\Livewire\VerifyVendor;
use App\Livewire\VendorLogin;
use App\Livewire\VendorRegister;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;



Route::get('/', Home::class)->name('home');
Route::get('/products', Product::class)->name('products');
Route::get('/products/{slug}', ProductDetail::class)->name('product-details');
Route::get('/cart', Cart::class)->name('cart');
Route::get('/checkout', Checkout::class)->name('checkout');
Route::get('/order-details', OrderDetails::class)->name('order-details');
Route::get('/user-register', Register::class)->name('user-register');
Route::get('/user-login', Login::class)->name('user-login');
Route::get('/vendor/verify', VerifyVendor::class)->name('seller-verify');
Route::get('/vendor/register', VendorRegister::class)->name('seller-register');



  
