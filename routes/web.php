<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('/datauser', function () {
//     return view('datauser');
// })->middleware(['auth', 'verified'])->name('datauser');

Route::get('/datauser', [UserController::class, 'show'])->middleware(['auth', 'verified'])->name('datauser');
Route::post('/datauserstore', [UserController::class, 'store'])->middleware(['auth', 'verified'])->name('tambah_datauser');

Route::get('/databuku', [BukuController::class, 'show'])->middleware(['auth', 'verified'])->name('databuku');


Route::get('/datapembelian', [PembelianController::class, 'show'])->middleware(['auth', 'verified'])->name('datapembelian');
Route::get('/tambah_datapembelian', [PembelianController::class, 'create'])->middleware(['auth', 'verified'])->name('tambah_pembelian');
Route::post('/store_datapembelian', [PembelianController::class, 'store'])->middleware(['auth', 'verified'])->name('store_pembelian');


Route::get('/peminjaman', function () {
    return view('peminjaman');
})->middleware(['auth', 'verified'])->name('peminjaman');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
