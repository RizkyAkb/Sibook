<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingDetailController;
use App\Http\Controllers\MemberDetailController;

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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('booking/create', [BookingController::class, 'create']);
Route::post('booking/create', [BookingController::class, 'store']);

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('lapangan', LapanganController::class);
    Route::get('booking', [BookingController::class, 'index']);
    Route::get('booking/{booking:id}', [BookingController::class, 'show']);
    Route::get('member/{user:username}', [UserController::class, 'show_detail']);
    // Route::resource('booking', BookingController::class);
    

});