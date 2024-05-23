<?php

use App\Http\Controllers\Admin\PanelControoler;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Customer\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//panel
Route::get('/panel', [PanelControoler::class, 'index'])->name('panel');

//post
Route::get('panel/posts', [PostController::class, 'index'])->name('panel.post');
Route::get('panel/posts/create', [PostController::class, 'create'])->name('panel.post.create');
Route::post('panel/posts/store', [PostController::class, 'store'])->name('panel.post.store');

//home-customer
Route::get('/', [HomeController::class, 'index'])->name('home.customer');
// Route::get('/', [HomeController::class, 'latestPost'])->name('home.customer.latestPost');
Route::get('/show-post/{post}', [HomeController::class, 'showPost'])->name('home.customer.showPost');
