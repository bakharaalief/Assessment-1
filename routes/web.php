<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

// Route::resource('/mahasiswa', MahasiswaController::class);
// Route::resource('/dosen', DosenController::class);
// Route::resource('/jadwal', JadwalController::class);

Auth::routes();

//home route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//dosen route
Route::prefix('/dosen')->middleware(['isDosen', 'auth'])->group(function () {
    Route::get('/', [DosenController::class, 'index'])->name('dosen.index');
    Route::put('/update-status/{id}', [DosenController::class, 'updateStatus'])->name('dosen.update-status');
    Route::get('/jadwal/{id}', [DosenController::class, 'showJadwal'])->name('dosen.show-jadwal');
    Route::get('/profile', [DosenController::class, 'profile'])->name('dosen.profile');
    Route::get('/profile/edit', [DosenController::class, 'editProfile'])->name('dosen.edit-profile');
    Route::put('/profile/update', [DosenController::class, 'updateProfile'])->name('dosen.update-profile');
});

//Mahasiwa Route
Route::prefix('/mahasiswa')->middleware(['isMahasiswa', 'auth'])->group(function () {
    Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/jadwal/create', [MahasiswaController::class, 'createJadwal'])->name('mahasiswa.create-jadwal');
    Route::post('/jadwal', [MahasiswaController::class, 'storeJadwal'])->name('mahasiswa.store-jadwal');
    Route::get('/jadwal/{id}', [MahasiswaController::class, 'showJadwal'])->name('mahasiswa.show-jadwal');
    Route::get('/jadwal/edit/{id}', [MahasiswaController::class, 'editJadwal'])->name('mahasiswa.edit-jadwal');
    Route::put('/jadwal/update/{id}', [MahasiswaController::class, 'updateJadwal'])->name('mahasiswa.update-jadwal');
    Route::delete('/jadwal/{id}', [MahasiswaController::class, 'destroyJadwal'])->name('mahasiswa.destroy-jadwal');
    Route::get('/profile', [MahasiswaController::class, 'profile'])->name('mahasiswa.profile');
    Route::get('/profile/edit', [MahasiswaController::class, 'editProfile'])->name('mahasiswa.edit-profile');
    Route::put('/profile/update', [MahasiswaController::class, 'updateProfile'])->name('mahasiswa.update-profile');
});

//admin route
Route::prefix('/admin')->middleware(['isAdmin', 'auth'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/dosen', [AdminController::class, 'dosenIndex'])->name('admin.dosen-index');
    Route::get('/mahasiswa', [AdminController::class, 'mahasiswaIndex'])->name('admin.mahasiswa-index');
    Route::resource('/jadwal', JadwalController::class);
});
