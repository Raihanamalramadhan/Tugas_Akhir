<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


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

// Bagoan Utama
Route::get('/', function () {
    return view('beranda_umum', [ //judul web setiap halaman
        "title" => "Beranda"
    ]);
});
Route::get('/dataMerek', "App\Http\Controllers\DashboardController@index");


Route::get('/kelasMerek', function () {
    return view('kelas_merek', [
        "title" => "kelas merek"
    ]);
});

Route::get('/tentang', function () {
    return view('tentang',[
        "title" => "tentang"
    ]);
});




//UMUM
Route::get('/daftardiri', "App\Http\Controllers\PengajuanController@index");
Route::post('/ajukan', "App\Http\Controllers\PengajuanController@store");


// tambah data
Route::get('/tambahdata', function () {
    return view('dataMerek.tambah_data');
});

// Masuk akun
Route::get('/cekdata', function () {
    return view('dataMerek.user_merek');
});



// route admin

// Route::get('/login_admin', function () {
//     return view('login_admin',[
//         "title" => "login admin"
//     ]);
// });


Route::get('/login_admin', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);


Route::get('/beranda', "App\Http\Controllers\PengajuanController@dashboard");



//hapus data pengajuan
Route::delete('/beranda/{id}', 'App\Http\Controllers\PengajuanController@delete')->name('beranda.delete');



Route::get('/detailPermintaan', function () {
    return view('admin.detailPermintaan',[
        "title" => "Beranda Admin"
    ]);
});

Route::get('/persentase', function () {
    return view('admin.persentase',[
        "title" => "Grafik Admin"
    ]);
});

Route::get('/datamerek', function () {
    return view('admin.datamerek',[
        "title" => "Data Merek"
    ]);
});

Route::get('/tambah', function () {
    return view('admin.tambah',[
        "title" => "pengaturan"
    ]);
});

Route::get('/pengaturan', function () {
    return view('admin.pengaturan',[
        "title" => "pengaturan"
    ]);
});

Route::get('/notifikasi', function () {
    return view('admin.notifikasi');
});