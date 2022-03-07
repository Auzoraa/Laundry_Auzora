<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DasarController;
use App\Http\Controllers\BarangInvController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::middleware(['auth', 'role:admin,kasir,owner'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dasar', [DasarController::class, 'index']);
    Route::resource('paket', PaketController::class);
    Route::resource('outlet', OutletController::class);
    Route::resource('member', MemberController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('barangInv', BarangInvController::class);
    Route::resource('laporan', LaporanController::class);
    Route::resource('user', UserController::class);
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('member/export/xls', [MemberController::class, 'export']);
    Route::get('paket/export/xls', [PaketController::class, 'export']);
    Route::get('outlet/export/xls', [OutletController::class, 'export']);
    Route::get('barangInv/export/xls', [BarangInvController::class, 'export']);
    Route::post('/member/import_excel', [MemberController::class, 'import_excel']);
    Route::post('/barangInv/import_excel', [BarangInvController::class, 'import_excel']);
    Route::post('/paket/import_excel', [PaketController::class, 'import_excel']);
    Route::post('/outlet/import_excel', [OutletController::class, 'import_excel']);
    Route::get('/pegawai/cetak_pdf', [PegawaiController::class, 'cetak_pdf']);
    
});

Route::middleware('guest')->group(function(){
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/', [LoginController::class, 'index'])->name('login');
});

// Route::group(['prefix'=>'a', 'middleware'=> ['isAdmin', 'auth']],function(){
//     Route::get('home', [HomeController::class, 'index'])->name('a.home');
//     Route::resource('paket', PaketController::class);
//     Route::resource('outlet', OutletController::class);
//     Route::resource('member', MemberController::class);
//     Route::resource('transaksi', TransaksiController::class);
//     Route::resource('laporan', LaporanController::class);
//     Route::post('logout', [LoginController::class, 'logout']);
//     Route::get('registrasi', [UserController::class, 'index']);
// });

// Route::group(['prefix'=>'k', 'middleware'=> ['isKasir', 'auth']],function(){
//     Route::get('home', [HomeController::class, 'index'])->name('k.home');
//     Route::resource('paket', PaketController::class);
//     Route::resource('member', MemberController::class);
//     Route::resource('transaksi', TransaksiController::class);
//     Route::resource('laporan', LaporanController::class);
//     Route::post('logout', [LoginController::class, 'logout']);
//     Route::get('registrasi', [UserController::class, 'index']);
// });

// Route::group(['prefix'=>'o', 'middleware'=> ['isOwner', 'auth']],function(){
//     Route::get('home', [HomeController::class, 'index'])->name('o.home');
//     Route::resource('laporan', LaporanController::class);
//     Route::post('logout', [LoginController::class, 'logout']);
// });

// Route::middleware('auth')->group(function(){

//     Route::get('/home', [HomeController::class, 'index']);
//     Route::resource('paket', PaketController::class);
//     Route::resource('outlet', OutletController::class);
//     Route::resource('member', MemberController::class);
//     Route::resource('laporan', LaporanController::class);
//     Route::resource('transaksi', TransaksiController::class);
//     Route::get('registrasi', [UserController::class, 'index']);
//     Route::post('/logout', [LoginController::class, 'logout']);
// });



