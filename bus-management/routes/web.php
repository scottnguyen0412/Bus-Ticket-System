<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Account\AccountController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;



use App\Http\Controllers\Auth\LoginController;





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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['logout'=>false]);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/',[FrontendController::class, 'index'])->name('frontend.index');
Route::get('/about',[AboutController::class, 'index'])->name('frontend.about');
Route::get('/contact', [ContactController::class, 'index'])->name('frontend.contact');

// Route::get('/home', [HomeController::class, 'index'])->name('home');


// Route::prefix('admin')->group(function(){
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
//     Route::get('/account',[AccountController::class,'index'])->name('admin.account.index');

// });

Route::group(['middleware' => 'auth'], function () {
    // Note: 'role:admin,driver' not have any space between
    Route::group(['prefix' => 'admin', 'middleware' => 'role:admin,driver'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/account',[AccountController::class,'index'])->name('admin.account.index');
    });

});