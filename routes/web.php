<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\AuthController;

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

Route::get('dashboard', function () {
    return view('admin.dashboard'); // Pastikan folder dan file sesuai
});
Route::get('app', function () {
    return view('admin.app'); // Pastikan folder dan file sesuai
});

Route::get('kamar', [KamarController::class, 'index'])->name('admin.kamar.index');

Route::get('kamar/create', [KamarController::class, 'create'])->name('admin.kamar.create');
Route::post('kamar/store', [KamarController::class, 'store'])->name('admin.kamar.store');
Route::get('kamar/{id}/edit', [KamarController::class, 'edit'])->name('admin.kamar.edit');
Route::put('kamar/{id}', [KamarController::class, 'update'])->name('admin.kamar.update');
Route::delete('/kamar/{id}', [KamarController::class, 'destroy'])->name('admin.kamar.destroy');


Route::get('reservasi', [ReservasiController::class, 'index'])->name('admin.reservasi.index');

Route::get('reservasi/create', [ReservasiController::class, 'create'])->name('admin.reservasi.create');
Route::post('reservasi/store', [ReservasiController::class, 'store'])->name('admin.reservasi.store');
Route::get('reservasi/{id}/edit', [ReservasiController::class, 'edit'])->name('admin.reservasi.edit');
Route::put('reservasi/{id}', [ReservasiController::class, 'update'])->name('admin.reservasi.update');
Route::delete('reservasi/{id}', [ReservasiController::class, 'destroy'])->name('admin.reservasi.destroy');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('app', [AuthController::class, 'app'])->middleware('auth')->name('admin.app');
