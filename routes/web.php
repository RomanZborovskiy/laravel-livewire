<?php

use App\Livewire\Admin\CreateProduct;
use App\Livewire\Home;
use App\Livewire\Shop\AllProduct;
use App\Livewire\Shop\Basket;
use App\Livewire\Shop\OneProduct;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class);

Route::get('/product', AllProduct::class)->name('all-product');
Route::get('/product/{id}', OneProduct::class)->name('one-product');

Route::prefix('admin')->group(function(){
 Route::get('create-product', CreateProduct::class)->name('create-product');
});

Route::get('/basket', Basket::class)->name('basket')->middleware('auth');


require __DIR__.'/auth.php';
