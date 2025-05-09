<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HelloController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeFrontendController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\pendaftarController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\SoalLowonganController;
use App\Http\Controllers\JawabanSoalLowonganController;
use App\Models\Pendaftar;
use Illuminate\Auth\Events\Login;
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

Route::get('/baru', function () {
    return view('hello');
});

Route::get('helloworld', [HelloController::class, 'index']);
Route::get('coba', [HelloController::class, 'hello']);
Route::get('tugas', [HelloController::class, 'tugas']);
Route::get('tugas2', [HelloController::class, 'tugas2']);
Route::resource('anggota', AnggotaController::class);



Route::get('login', [LoginController::class, 'loginBackEnd'])->name('backend.login');
Route::post('login', [LoginController::class, 'authenticateBackEnd'])->name('backend.login');
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');
// Menampilkan halaman form reset password
Route::get('reset-password', [LoginController::class, 'reset_password'])->name('reset_password');

// Mengirimkan link reset password ke email pengguna
Route::post('send-reset-link', [LoginController::class, 'sendResetLink'])->name('password.email');

// Menangani proses reset password setelah pengguna mengisi form baru password
// Rute untuk halaman reset password form
Route::get('password/reset/{token}', [LoginController::class, 'showResetForm'])->name('password.reset');

// Rute untuk proses update password
Route::post('password/reset', [LoginController::class, 'resetPassword'])->name('password.update');


// RUTE BACKEND
Route::middleware(['auth','role:superadmin'])->group(function () {
    // Halaman utama backend
    Route::get('home', [HomeController::class, 'content1'])->name('home');

    // Logout

    // Content 1
    Route::get('/content', function () {
        return view('backend.content1');
    });

    // Content 2
    Route::get('/content2', [TableController::class, 'index'])->name('backend.content2');
    Route::delete('/content2/{id}', [TableController::class, 'destroy'])->name('backend.content2.destroy');
    Route::post('/content2/store', [TableController::class, 'store'])->name('backend.content2.store');
    Route::post('/content2/store2', [TableController::class, 'store2'])->name('backend.content2.store2');
    Route::get('/content2/tambah', [TableController::class, 'create'])->name('backend.content2.create');
    Route::get('/content2/tambah2', [TableController::class, 'create2'])->name('backend.content2.create2');
    Route::get('/content2/edit/{id}/', [TableController::class, 'edit'])->name('backend.content2.edit');
    Route::put('/content2/update/{id}', [TableController::class, 'update'])->name('backend.content2.update');
    Route::get('/content2/edit2/{id}/{status}', [TableController::class, 'edit2'])->name('backend.content2.edit2');
    Route::put('/content2/update2/{id}/{status}', [TableController::class, 'update2'])->name('backend.content2.update2');

    // Content 3
    Route::get('/content3', [pendaftarController::class, 'index'])->name('backend.content3.index');
    Route::patch('/backend/content3/{id}/update-status', [pendaftarController::class, 'updateStatus'])->name('backend.content3.updateStatus');
    Route::post('/content3/terima/{lamaran_id}', [TableController::class, 'terimaPendaftar'])->name('terima.pendaftar');
    Route::delete('/content3/{id}', [pendaftarController::class, 'destroy'])->name('backend.content3.destroy');

    // Content 4
    Route::get('/content4', [PerusahaanController::class, 'index'])->name('backend.content4');
    Route::delete('/content4/{id}', [PerusahaanController::class, 'destroy'])->name('backend.content4.destroy');
    Route::post('/content4/store', [PerusahaanController::class, 'store'])->name('backend.content4.store');
    Route::get('/content4/tambah', [PerusahaanController::class, 'create'])->name('backend.content4.create');
    Route::get('/content4/edit/{id}', [PerusahaanController::class, 'edit'])->name('backend.content4.edit');
    Route::put('/content4/update/{id}', [PerusahaanController::class, 'update'])->name('backend.content4.update');

    // Content 5
    Route::get('/content5/{nama}', [pendaftarController::class, 'index2'])->name('backend.content5');
    Route::post('/laporan/generate2', [LaporanController::class, 'generate2'])->name('laporan.generate2');

// TAMPIL ADMIN
Route::get('/content6', [UserController::class, 'admin'])->name('backend.content6');

// HAPUS ADMIN
Route::delete('/content6/{id}', [UserController::class, 'destroy'])->name('backend.content6.destroy');

// TAMBAH ADMIN
Route::post('/content6/store', [UserController::class, 'useradmin'])->name('backend.content6.useradmin');

// EDIT ADMIN (POST ke .store buat update)
Route::post('/content6/store/{id}', [UserController::class, 'store'])->name('backend.content6.store');

// TAMPIL FORM TAMBAH (nggak dipakai di Blade lo, tapi gpp)
Route::get('/content6/tambah', [UserController::class, 'create'])->name('backend.content6.create');

// TAMPIL FORM EDIT (juga nggak dipakai)
Route::get('/content6/edit/{id}', [UserController::class, 'edit'])->name('backend.content6.edit');

    

    // Menampilkan daftar lowongan
    Route::get('/content7', [LowonganController::class, 'index'])->name('backend.content7');
    Route::get('/lowongan/tambah', [LowonganController::class, 'create'])->name('backend.content7.create');
    Route::post('/lowongan/store', [LowonganController::class, 'store'])->name('backend.content7.store');
    Route::get('/lowongan/{id}/soal', [LowonganController::class, 'soal'])->name('backend.content7.soal');
    Route::post('/lowongan/{id}/soal', [LowonganController::class, 'tambahSoal'])->name('backend.content7.tambahSoal');
    Route::get('/lowongan/{id}/edit', [LowonganController::class, 'edit'])->name('backend.content7.edit');
    Route::put('/lowongan/{id}/update', [LowonganController::class, 'update'])->name('backend.content7.update');
    Route::delete('/lowongan/{id}', [LowonganController::class, 'destroy'])->name('backend.content7.destroy');    

    Route::post('logout', [LoginController::class, 'logoutBackEnd'])->name('backend.logout');


});


// route khusus frontend
Route::get('/homefrontend', [HomeFrontendController::class, 'index']) ->name('homefrontend');
Route::get('/lowonganfrontend', [HomeFrontendController::class, 'lowongan']) ->name('lowonganfrontend');
Route::get('/aboutusfrontend', [HomeFrontendController::class, 'aboutus']) ->name('aboutusfrontend');
Route::get('/lowongan/{id}', [HomeFrontendController::class, 'lowongan1'])->name('lowonganfrontend1');
Route::post('/lowongan/tambah/{lowonganid}', [LowonganController::class, 'simpanLamaran'])->name('lowongan.tambah');
Route::post('/content3/store', [PendaftarController::class, 'store'])->name('backend.content3.store');
Route::get('/lowonganfrontend2', [HomeFrontendController::class, 'lowongan2']) ->name('lowonganfrontend2');
Route::get('/lowonganfrontend3', [HomeFrontendController::class, 'lowongan3']) ->name('lowonganfrontend3');
Route::get('/lowonganfrontend4', [HomeFrontendController::class, 'lowongan4']) ->name('lowonganfrontend4');
Route::middleware(['auth','role:customer'])->group(function () {
    Route::get('profile',[UserController::class,'index'])->name('profile');
    Route::get('history',[UserController::class,'history'])->name('history');
    Route::post('profile/update/{id}', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile/updateFoto/{id}', [UserController::class, 'updateFoto'])->name('profile.updateFoto');
    Route::post('/laporan/generate', [LaporanController::class, 'generate'])->name('laporan.generate');


});
Route::middleware(['auth','role:admin,superadmin,customer'])->group(function () {
    Route::post('logout', [LoginController::class, 'logoutBackEnd'])->name('backend.logout');
});
