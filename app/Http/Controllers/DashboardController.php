<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use App\Models\Kelas;
use App\Models\Kabupaten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User; // Pastikan Anda mengimpor model User yang benar
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        $kabupaten = DB::table("kabupatens")->get();

        return view('dataMerek.data_merek', compact('kabupaten'));
    }

    public function create()
    {
        $kelas = Kelas::get();
        $tipe = Tipe::get();
        $kabupaten = Kabupaten::get();
        return view('dataMerek.tambah_data', compact('kelas', 'tipe', 'kabupaten'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'id_tipe' => 'required',
        'id_kelas' => 'required',
        'id_kabupaten' => 'required',
        'nomor_pemohon' => 'required',
        'nama_pemilik' => 'required',
        'nomor_telepon' => 'required',
        'email' => 'required',
        'nama_merek' => 'required',
        'tahun_penerimaan' => 'required',
        'gambar_merek' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'foto_sertifikat' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:2048',
        'longitude' => 'required',
        'latitude' => 'required',
    ]);

    $gambarMerek = $request->file('gambar_merek');
    $imageNameMerek = $gambarMerek->getClientOriginalName();
    $gambarMerek->storeAs('public/uploads', $imageNameMerek);

    $fotoSertifikat = $request->file('foto_sertifikat');
    $imageNameSertifikat = $fotoSertifikat->getClientOriginalName();
    $fotoSertifikat->storeAs('public/uploads', $imageNameSertifikat);

    $newUser = new User();
    $newUser->nomor_pemohon = $request->nomor_pemohon;
    $newUser->nama_pemilik = $request->nama_pemilik;
    $newUser->nomor_telepon = $request->nomor_telepon;
    $newUser->email = $request->email;
    $newUser->nama_merek = $request->nama_merek;
    $newUser->tahun_penerimaan = $request->tahun_penerimaan;
    $newUser->id_tipe = $request->id_tipe;
    $newUser->id_kelas = $request->id_kelas;
    $newUser->gambar_merek = $imageNameMerek;
    $newUser->foto_sertifikat = $imageNameSertifikat;
    $newUser->id_kabupaten = $request->id_kabupaten;
    $newUser->latitude = $request->latitude;
    $newUser->longitude = $request->longitude;
    $newUser->save();

    return redirect('addData')->with('success', 'Register berhasil, tunggu konfirmasi dari admin');
}

    public function showDataMerek()
    {
        $users = User::all(); // Mengambil semua data pengguna dari model "User"

        return view('admin.notifikasi', compact('users')); // Meneruskan data pengguna ke tampilan (view)
    }

    public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    if ($user) {
        $user->delete();
        return back()->with('success', 'Data berhasil ditolak');
    } else {
        return back()->with('error', 'Data tidak ditemukan');
    }
}
    // ...
}
