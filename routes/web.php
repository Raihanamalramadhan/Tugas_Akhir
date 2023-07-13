<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

//bagian data merek
Route::get('/cekdata', "App\Http\Controllers\UserController@cekData");
Route::get('/dataMerek', "App\Http\Controllers\DashboardController@index");
Route::get('/addData', "App\Http\Controllers\DashboardController@create");
Route::post('/tambahData', "App\Http\Controllers\DashboardController@store");

// Route::get('/data/{id}/edit', "App\Http\Controllers\NomorPemohonController@edit")->name('data.edit');
// Route::put('/usermerek/{nomor_pemohon}', "App\Http\Controllers\UserController@update")->name('data.update');
Route::post('/cekdata', "App\Http\Controllers\UserController@cekData")->name('cekdata');
Route::get('/usermerek/{nomor_pemohon}', 'App\Http\Controllers\UserController@showUserMerek')->name('usermerek');
Route::put('/username/edit/{id}', "App\Http\Controllers\UserController@update")->name('username.edit');

// Tambahkan rute ini jika belum ada
// Route::get('/cekdata', function () {
//     return view('dataMerek.user_merek');
// });


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

Route::get('/login_admin', function () {
    return view('login_admin',[
        "title" => "login admin"
    ]);
});



// bagian daftar diri
Route::get('/daftardiri', "App\Http\Controllers\PengajuanController@index");
Route::post('/ajukan', "App\Http\Controllers\PengajuanController@store");


// tambah data
// Route::get('/tambahdata', function () {
//     return view('dataMerek.tambah_data');
// });


// route admin
Route::get('/beranda', "App\Http\Controllers\PengajuanController@dashboard");

//hapus data pengajuan
Route::delete('/beranda/{id}', 'App\Http\Controllers\PengajuanController@delete')->name('beranda.delete');
// Route::get('/beranda', function () {
//     return view('admin.beranda',[
//         "title" => "Beranda Admin"
//     ]);
// });

Route::get('/detailPermintaan/{id}', 'App\Http\Controllers\PengajuanController@show')->name('detailPermintaan');
// Route::get('/detailPermintaan', function () {
//     return view('admin.detailPermintaan',[
//         "title" => "Beranda Admin"
//     ]);
// });

Route::get('/persentase', "App\Http\Controllers\DatagrafikController@index");
// Route::get('/persentase', function () {
//     return view('admin.persentase',[
//         "title" => "Grafik Admin"
//     ]);
// });

Route::get('/{id}/edit', "App\Http\Controllers\MerekController@edit");
Route::put('/{id}', "App\Http\Controllers\MerekController@update");
// Route::get('/edit_data', function () {
//     return view('admin.edit_data',[
//         "title" => "Grafik Admin"
//     ]);
// });

// Route::get('/datamerek', function () {
//     return view('admin.datamerek',[
//         "title" => "Data Merek"
//     ]);
// });

// Route::get('/tambah', function () {
//     return view('admin.tambah',[
//         "title" => "pengaturan"
//     ]);
// });

Route::get('/datamerek', "App\Http\Controllers\MerekController@index");
Route::get('/datamerek', "App\Http\Controllers\MerekController@showDataMerek");
Route::get('/tambah', "App\Http\Controllers\MerekController@create");
Route::post('/tambahdataAdmin', "App\Http\Controllers\MerekController@store");

Route::get('/pengaturan', function () {
    return view('admin.pengaturan',[
        "title" => "pengaturan"
    ]);
});

Route::post('/notifikasi/terima/{userId}', 'App\Http\Controllers\DashboardController@terimaData')->name('notifikasi.terima');
Route::get('/notifikasi', "App\Http\Controllers\DashboardController@showDataMerek");
Route::delete('/notifikasi/{id}', 'App\Http\Controllers\DashboardController@destroy')->name('notifikasi.delete');
// Route::get('/notifikasi', function () {
//     return view('admin.notifikasi');
// });