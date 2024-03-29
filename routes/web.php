<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\nilaiController;


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
    return view('home');
})->middleware('auth');

Auth::routes();

Route::resource('mahasiswas', MahasiswaController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [MahasiswaController::class, 'search'])->name('search');
// Route::get('/nilai/{Nim}', [MahasiswaController::class, 'nilai'])->name('nilai');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/mahasiswas/nilai/{mahasiswa}', [MahasiswaController::class, 'nilai']);
Route::get('/nilai/{mahasiswa_id}/cetak_pdf', [MahasiswaController::class ,'mhs_pdf'])->name('mahasiswas.cetak');