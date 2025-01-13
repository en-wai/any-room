<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index'); //Welcome page
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about'); //About  page
Route::get('/services', [App\Http\Controllers\HomeController::class, 'services'])->name('services'); //About  page
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact'); //About  page

// Hotels
Route::get('hotels/rooms/{id}', [App\Http\Controllers\Hotels\HotelsController::class, 'rooms'])->name('hotel.rooms');
Route::get('hotels/rooms-details/{id}', [App\Http\Controllers\Hotels\HotelsController::class, 'roomDetails'])->name('hotel.rooms.details');
Route::post('hotels/rooms-booking/{id}', [App\Http\Controllers\Hotels\HotelsController::class, 'roomBooking'])->name('hotel.rooms.booking');

// Payment Routes with Restricted Access Middleware
Route::get('hotels/pay', [App\Http\Controllers\Hotels\HotelsController::class, 'pay'])->middleware('restrict.access')->name('hotel.pay');
Route::get('hotels/pay/success', [App\Http\Controllers\Hotels\HotelsController::class, 'paypalSuccess'])->middleware('restrict.access')->name('hotel.paypal.success');
Route::get('hotels/pay/cancel', function () {
    return redirect()->route('hotel.pay')->withErrors(['error' => 'Payment cancelled.']);
})->name('hotel.paypal.cancel');
Route::match(['get', 'post'], 'hotels/success', [App\Http\Controllers\Hotels\HotelsController::class, 'success'])->middleware('restrict.access')->name('hotel.success');

// Users
Route::get('users/bookings', [App\Http\Controllers\Users\UsersController::class, 'bookings'])->name('users.bookings')->middleware('auth:web');
