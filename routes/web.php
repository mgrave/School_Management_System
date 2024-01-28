<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    return view('welcome');
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.home');
    })->name('dashboard');
});

Route::controller(AdminController::class)->prefix('admin')->group(function (){
    Route::get('logout','logOut')->name('admin.logout');
});

//user management routes......
Route::controller(UserController::class)->middleware('auth:sanctum')
    ->prefix('user')
    ->group(function (){
    Route::get('view','userView')->name('user_view');
    Route::get('add','userAdd')->name('user_add');
});
