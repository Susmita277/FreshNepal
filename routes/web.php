<?php

use App\Livewire\Home;
use App\Livewire\Product;
use App\Livewire\ProductDetail;
use Illuminate\Support\Facades\Route;


Route::get('/', Home::class)->name('home');
Route::get('/products' ,Product::class)->name('product');
Route::get('/productsdetails' ,ProductDetail::class)->name('product-details');