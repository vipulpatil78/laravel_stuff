<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;

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
})->name('welcome');

Route::get('login', [AuthController::class, 'login'])->name('login.user');
Route::post('/user/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'createUser'])->name('user.create');
Route::post('login', [AuthController::class, 'loginAuthenticate'])->name('login.auth');
Route::middleware(['auth'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('tags', TagController::class);
});
Route::get('forgot-password', [
    ForgotPasswordController::class,
    'forgotPassword'])->name('forgotpassword');

Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPasswordPost'])->name('forgot.password');
Route::get('reset-password/{token}', ForgotPasswordController::class, 'resetPassword')->name('resetpassword');
Route::get('reset-password', ForgotPasswordController::class, 'resetPasswordPost')->name('reset.password');
