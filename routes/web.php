<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\SewaController;

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
    return view('auth/login');
});

Route::get('/login', function () {
    return view('auth/login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function(){
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});
Route::middleware(['Admin'])->group(function() {
    Route::get('/admin/home', [HomeController::class, 'dashboardAdmin'])->name('adminHome');
    Route::resource('/admin/mobil', MobilController::class);
    Route::resource('/admin/pengembalian', PengembalianController::class);
    Route::post('/admin/pengembalian/cekData', [PengembalianController::class, 'cekData'])->name('kembali.cekData');
    Route::post('/admin/pengembalian/cekData/create', [PengembalianController::class, 'create'])->name('kembali.create');
});

Route::middleware(['Users'])->group(function() {
    Route::get('/users/home', [HomeController::class, 'dashboardUsers'])->name('usersHome');
    Route::get('/users/showMobil/index', [MobilController::class, 'indexUsers'])->name('showMobil');
    Route::get('/users/showMobil/show/{id}', [MobilController::class, 'showUsers'])->name('showMobilDetail');
    Route::post('/users/mobil/filter', [MobilController::class, 'cari'])->name('filter');
    Route::resource('/users/sewa', SewaController::class);
    Route::post('/users/sewa/mobilTersedia', [SewaController::class, 'prosesCari'])->name('sewa.showMobil');
    Route::post('/users/sewa/', [SewaController::class, 'store'])->name('sewa.storeSewa');
});