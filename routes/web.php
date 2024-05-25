<?php

use App\Http\Controllers\Admin\PanelControoler;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Auth\UserController;
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
Route::prefix('panel')->group(function () {
    Route::resource('posts', PostController::class)->except([
        'show'
    ])->names([
        'index' => 'panel.post',
        'create' => 'panel.post.create',
        'store' => 'panel.post.store',
    ]);
});

//users

Route::resource('users', UserController::class)
    ->names([
        'index' => 'users',
        'create' => 'user.create',
        'store' => 'user.store',
    ]);


//home-customer
Route::get('/', [HomeController::class, 'index'])->name('home.customer');
// Route::get('/', [HomeController::class, 'latestPost'])->name('home.customer.latestPost');
Route::get('/show-post/{post}', [HomeController::class, 'showPost'])->name('home.customer.showPost');
