<?php

use Illuminate\Support\Facades\Route;

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
    return view('landing.beranda');
})->name('index');
Route::prefix('landing')->name('landing.')->group(function () {
    Route::get('/daftar', 'LandingController@daftar')->name('daftar');
    Route::post('/daftar', 'LandingController@daftarStore')->name('daftar-post');
    Route::get('/layanan', 'LandingController@layanan')->name('layanan');
    Route::get('/tentang', 'LandingController@tentang')->name('tentang');
    Route::get('/progres', 'LandingController@progres')->name('progres');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', 'Admin\AuthController@loginForm')->name('loginForm');
    Route::post('/login', 'Admin\AuthController@login')->name('login');
    Route::post('/logout', 'Admin\AuthController@logout')->name('logout');
});
Route::prefix('pelanggan')->name('pelanggan.')->group(function () {
    Route::get('/login', 'Pelanggan\AuthController@loginForm')->name('loginForm');
    Route::post('/login', 'Pelanggan\AuthController@login')->name('login');
    Route::post('/logout', 'Pelanggan\AuthController@logout')->name('logout');
});
Route::prefix('pelanggan')->name('pelanggan.')->middleware(['middleware' => 'pelanggan'])->group(function () {
    Route::get('/', 'Pelanggan\DashboardController@index')->name('index');
    Route::prefix('transaksi')->name('transaksi.')->group(function () {
        Route::get('', 'Pelanggan\TransaksiController@index')->name('index');
        Route::get('edit/{id}', 'Pelanggan\TransaksiController@edit')->name('edit');
        Route::get('create', 'Pelanggan\TransaksiController@create')->name('create');
        Route::put('update/{id}', 'Pelanggan\TransaksiController@update')->name('update');
        Route::post('store', 'Pelanggan\TransaksiController@store')->name('store');
        Route::post('delete', 'Pelanggan\TransaksiController@delete')->name('delete');
    });
});

Route::prefix('admin')->name('admin.')->middleware(['middleware' => 'admin'])->group(function () {
    Route::get('/', 'Admin\DashboardController@index')->name('index');
    Route::prefix('transaksi')->name('transaksi.')->group(function () {
        Route::get('', 'Admin\TransaksiController@index')->name('index');
        Route::get('edit/{id}', 'Admin\TransaksiController@edit')->name('edit');
        Route::get('create', 'Admin\TransaksiController@create')->name('create');
        Route::put('update/{id}', 'Admin\TransaksiController@update')->name('update');
        Route::post('store', 'Admin\TransaksiController@store')->name('store');
        Route::delete('delete', 'Admin\TransaksiController@delete')->name('delete');
    });
    Route::prefix('layanan')->name('layanan.')->group(function () {
        Route::get('', 'Admin\LayananController@index')->name('index');
        Route::post('store', 'Admin\LayananController@store')->name('store');
        Route::put('update', 'Admin\LayananController@update')->name('update');
        Route::delete('delete', 'Admin\LayananController@delete')->name('delete');
    });
    Route::prefix('tipe-kendaraan')->name('tipe_kendaraan.')->group(function () {
        Route::get('', 'Admin\TipeKendaraanController@index')->name('index');
        Route::post('store', 'Admin\TipeKendaraanController@store')->name('store');
        Route::put('update', 'Admin\TipeKendaraanController@update')->name('update');
        Route::delete('delete', 'Admin\TipeKendaraanController@delete')->name('delete');
    });
    Route::prefix('tentang-kami')->name('tentang_kami.')->group(function () {
        Route::get('', 'Admin\TentangKamiController@index')->name('index');
    });
});
