<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MahasiswaController;
use App\Models\Mahasiswa;
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

    //segala hal tentang jadwal
    Route::get('/jadwal/{id}', [DosenController::class, 'showJadwal'])->name('dosen.show-jadwal');
    Route::get('/jadwal', [DosenController::class, 'jadwalIndex'])->name('dosen.jadwal');
    Route::put('/update-status/{id}', [DosenController::class, 'updateStatus'])->name('dosen.update-status');

    //segala hal tentang profile
    Route::get('/profile', [DosenController::class, 'profile'])->name('dosen.profile');
    Route::get('/profile/edit', [DosenController::class, 'editProfile'])->name('dosen.edit-profile');
    Route::put('/profile/update', [DosenController::class, 'updateProfile'])->name('dosen.update-profile');
});

//Mahasiwa Route
Route::prefix('/mahasiswa')->middleware(['isMahasiswa', 'auth'])->group(function () {
    Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.index');

    //segala hal tentang jadwal
    Route::get('/jadwal', [MahasiswaController::class, 'jadwalIndex'])->name('mahasiswa.jadwal');
    Route::post('/jadwal', [MahasiswaController::class, 'storeJadwal'])->name('mahasiswa.store-jadwal');
    Route::get('/jadwal/create', [MahasiswaController::class, 'createJadwal'])->name('mahasiswa.create-jadwal');
    Route::get('/jadwal/{id}', [MahasiswaController::class, 'showJadwal'])->name('mahasiswa.show-jadwal');
    Route::get('/jadwal/edit/{id}', [MahasiswaController::class, 'editJadwal'])->name('mahasiswa.edit-jadwal');
    Route::put('/jadwal/update/{id}', [MahasiswaController::class, 'updateJadwal'])->name('mahasiswa.update-jadwal');
    Route::delete('/jadwal/{id}', [MahasiswaController::class, 'destroyJadwal'])->name('mahasiswa.destroy-jadwal');

    //segala hal tentang profile
    Route::get('/profile', [MahasiswaController::class, 'profile'])->name('mahasiswa.profile');
    Route::get('/profile/edit', [MahasiswaController::class, 'editProfile'])->name('mahasiswa.edit-profile');
    Route::put('/profile/update', [MahasiswaController::class, 'updateProfile'])->name('mahasiswa.update-profile');
});

//admin route
Route::prefix('/admin')->middleware(['isAdmin', 'auth'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    //segala hal tentang user 
    Route::get('/dosen', [AdminController::class, 'dosenIndex'])->name('admin.dosen-index');
    Route::get('/mahasiswa', [AdminController::class, 'mahasiswaIndex'])->name('admin.mahasiswa-index');
    Route::get('/user/{type}/create', [AdminController::class, 'createUser'])->name('admin.create-user');
    Route::post('/user/{type}', [AdminController::class, 'storeUser'])->name('admin.store-user');
    Route::get('/user/edit/{id}', [AdminController::class, 'editUser'])->name('admin.edit-user');
    Route::put('/user/{type}/{id}', [AdminController::class, 'updateUser'])->name('admin.update-user');
    Route::delete('/user/{type}/{id}', [AdminController::class, 'destroyUser'])->name('admin.destroy-user');

    //segala hal tentang profile
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/profile/edit', [AdminController::class, 'editProfile'])->name('admin.edit-profile');
    Route::put('/profile/update', [AdminController::class, 'updateProfile'])->name('admin.update-profile');

    //segala hal tentang jadwal
    Route::resource('/jadwal', JadwalController::class);
});
