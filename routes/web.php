<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Products;
use App\Http\Livewire\Users;
use App\Http\Livewire\ProductCategory;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/',Dashboard::class)->name('landing.index');
Route::get('/users',Users::class)->name('users.index');
Route::get('/category',ProductCategory::class)->name('category.index');
Route::get('/products',Products::class)->name('products.index');