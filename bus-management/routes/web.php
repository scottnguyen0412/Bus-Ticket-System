<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Account\AccountController;
use App\Http\Controllers\Admin\Bus\BusController;
use App\Http\Controllers\Admin\Schedule\ScheduleController;
use App\Http\Controllers\Admin\StartDestination\StartController;

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
        // Index for account
        Route::get('/account',[AccountController::class,'index'])->name('admin.account.index');
        Route::post('/account/create',[AccountController::class, 'create'])->name('admin.account.create');
        // Display all account
        Route::get('/get-all-account', [AccountController::class, 'getAllRowData']);
        // Edit
        Route::get('/account/edit/{id}', [AccountController::class, 'edit'])->name('admin.account.edit');
        Route::post('/account/update/{id}', [AccountController::class, 'update'])->name('admin.account.update');
        Route::delete('/account/delete/{id}', [AccountController::class, 'delete'])->name('admin.account.delete');
        // Ban Account
        Route::get('/account/ban/{id}/{status_code}', [AccountController::class,'banAccount'])->name('admin.account.ban');

        Route::get('/bus', [BusController::class, 'index'])->name('admin.bus.index');
        Route::post('/bus/create', [BusController::class, 'create'])->name('admin.bus.create');
        // Display all bus
        Route::get('/get-all-bus', [BusController::class, 'getAllRowData']);

        Route::get('/image-bus/{id}', [BusController::class, 'showImage'])->name('admin.account.viewImage');

        // Edit
        Route::get('/bus/edit/{id}', [BusController::class, 'edit'])->name('admin.bus.edit');
        Route::post('/bus/update/{id}', [BusController::class, 'update'])->name('admin.bus.update');

        // Delete bus
        Route::delete('/bus/delete/{id}', [BusController::class, 'delete'])->name('admin.bus.delete');
        // Delete từng ảnh của bus
        Route::get('/bus/delete-image-bus/{bus_image_id}', [BusController::class,'deleteImage'])->name('admin.bus.deleteImage');

        // Index Schedule
        Route::get('/schedule',[ScheduleController::class, 'index'])->name('admin.schedule.index');
        // Display all schedule
        Route::get('/get-all-schedule', [ScheduleController::class, 'getAllRowData']);


        
        // Index page of start Destination
        Route::get('/start-dest', [StartController::class, 'index'])->name('admin.startdestination.index');
        // Create Start Destination
        Route::get('/start-dest/create', [StartController::class, 'create'])->name('admin.startdestination.create');
        // Display all start destination
        Route::get('/get-all-start-dest', [StartController::class, 'getAllRowData']);
        Route::post('/start-dest/store', [StartController::class, 'store'])->name('admin.startdestination.store');
        Route::get('/start-dest/show', [StartController::class, 'show'])->name('admin.startdestination.show');
        
        Route::get('/start-dest/show-map', [StartController::class, 'showmap'])->name('admin.startdestination.showmap');
    }); 

});