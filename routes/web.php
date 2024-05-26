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
Route::prefix('/panel')->middleware('checkAuth')->group(function () {
    Route::get('/', [PanelControoler::class, 'index'])->name('panel');
    //post
    Route::prefix('posts')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('panel.post');
        Route::get('/create', [PostController::class, 'create'])->name('panel.post.create');
        Route::post('/store', [PostController::class, 'store'])->name('panel.post.store');
    });
});






//users

Route::resource('auth', UserController::class)->except('show')
    ->names([
        'index' => 'users',
        'create' => 'user.create',
        'store' => 'user.store',
    ]);


Route::get('auth/login', [UserController::class, 'login'])->name('user.login');
Route::post('auth/checkLogin', [UserController::class, 'checkLogin'])->name('user.checkLogin');
//home-customer
Route::get('/', [HomeController::class, 'index'])->name('home.customer');
// Route::get('/', [HomeController::class, 'latestPost'])->name('home.customer.latestPost');
Route::get('/show-post/{post}', [HomeController::class, 'showPost'])->name('home.customer.showPost');
