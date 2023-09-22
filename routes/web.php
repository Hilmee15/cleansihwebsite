<?php

use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\TransaksiController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('login', [LoginController::class, 'index'])->name('login');

Route::get('/', [LayoutController::class, 'index'])->middleware('auth');
Route::get('/home', [LayoutController::class, 'index'])->middleware('auth');

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout');
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cekUserLogin:1']], function () {
        Route::resource('paket', PaketController::class);
        Route::resource('outlet', OutletController::class);
        Route::resource('transaksi', TransaksiController::class);

        Route::controller(OutletController::class)->group(function() {
            Route::get('/outlet','index')->name('outlet.view');
            Route::post('/add-oulet', 'store')->name('add.outlet');
            Route::post('/update-outlet/{id}', 'update')->name('update.outlet');
            Route::get('/delete/{id}/outlet', 'destroy')->name('destroy.outlet');
        });

        Route::controller(PaketController::class)->group(function() {
            Route::get('/paket','index')->name('paket.view');
            Route::post('/add-paket', 'store')->name('add.paket');
            Route::post('/update-paket/{id}', 'update')->name('update.paket');
            Route::get('/delete/{id}/paket', 'destroy')->name('destroy.paket');
        });

        Route::controller(TransaksiController::class)->group(function() {
            Route::get('/transaksi','viewTransaksi')->name('transaksi.view');
            Route::post('/add-transaksi', 'store')->name('add.transaksi');
            Route::post('/update-transaksi/{id}', 'update')->name('update.transaksi');
            Route::get('/delete/{id}/transaksi', 'destroy')->name('destroy.transaksi');
        });
    });

    Route::group(['middleware' => ['cekUserLogin:2']], function () {
        Route::resource('transaksi', TransaksiController::class);
    });
});
