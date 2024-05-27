<?php

use App\Http\Controllers\Admin\PanelControoler;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Customer\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
Route::prefix('/panel')->group(function () {
    Route::get('/', [PanelControoler::class, 'index'])->name('panel');

    // $role = Role::query()->find(1);
    $permission = Permission::query()->find(1);
    $user = User::query()->find(2);
    #this is for ekhtesas dadane yek permission be User
    // $user->givePermissionTo($permission);
    $users = $user->query()->with('permissions')->get();
    // dd($users);
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