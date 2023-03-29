<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\userController;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\sppController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\pembayaranController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// ///////////////////////////Route Group Guest
Route::group(['middleware' => 'guest'], function (){
            // ////////////////////////login
            Route::get('/login',[ LoginController::class, 'login'])->name('login');
            Route::post('/masuk',[ LoginController::class, 'masuk']);
            // /////////////////////// Home Guest

});

//                                              ----------Mid Siswa + Admin + Petugas-----------
Route::group(['middleware' => 'auth'], function (){
            // //////////////////////// Home Auth + Logout
Route::get('/',[ LoginController::class, 'index']);
Route::post('/logout',[ LoginController::class, 'keluar']);
Route::get('/pembayaran/transaksi/{id}',[ pembayaranController::class, 'transaksi']);

});

//                                              ----------Mid Petugas + Admin-----------
Route::group(['middleware' =>  'level:admin,petugas,siswa', 'auth'], function (){
// ////////////////////////pembayaran
Route::get('/pembayaran',[ pembayaranController::class, 'index']);
Route::post('/pembayaran/simpan',[ pembayaranController::class, 'simpan']);
Route::get('/pembayaran/edit/{id}',[ pembayaranController::class, 'edit']);
Route::post('/pembayaran/update',[ pembayaranController::class, 'update']);
Route::get('/pembayaran/hapus/{id}',[ pembayaranController::class, 'hapus']);

});

//                                              ----------Mid Admin Only -----------
Route::group(['middleware' => 'level:admin', 'auth'], function (){
// ////////////////////////user
Route::get('/user',[ userController::class, 'index']);
Route::get('/user/tambah',[ userController::class, 'tambah']);
Route::post('/user/simpan',[ userController::class, 'simpan']);
Route::get('/user/edit/{id}',[ userController::class, 'edit']);
Route::post('/user/update',[ userController::class, 'update']);
Route::get('/user/hapus/{id}',[ userController::class, 'hapus']);

// ////////////////////////kelas
Route::get('/kelas',[ kelasController::class, 'index']);
Route::get('/kelas/tambah',[ kelasController::class, 'tambah']);
Route::post('/kelas/simpan',[ kelasController::class, 'simpan']);
Route::get('/kelas/edit/{id}',[ kelasController::class, 'edit']);
Route::post('/kelas/update',[ kelasController::class, 'update']);
Route::get('/kelas/hapus/{id}',[ kelasController::class, 'hapus']);

// ////////////////////////spp
Route::get('/spp',[ sppController::class, 'index']);
Route::get('/spp/tambah',[ sppController::class, 'tambah']);
Route::post('/spp/simpan',[ sppController::class, 'simpan']);
Route::get('/spp/edit/{id}',[ sppController::class, 'edit']);
Route::post('/spp/update',[ sppController::class, 'update']);
Route::get('/spp/hapus/{id}',[ sppController::class, 'hapus']);

// ////////////////////////siswa
Route::get('/siswa',[ siswaController::class, 'index']);
Route::get('/siswa/tambah',[ siswaController::class, 'tambah']);
Route::post('/siswa/simpan',[ siswaController::class, 'simpan']);
Route::get('/siswa/edit/{id}',[ siswaController::class, 'edit']);
Route::post('/siswa/update',[ siswaController::class, 'update']);
Route::get('/siswa/hapus/{id}',[ siswaController::class, 'hapus']);


});

