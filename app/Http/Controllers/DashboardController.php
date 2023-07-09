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
        $users = User::join('tipes', 'users.id_tipe', '=', 'tipes.id')
        ->join('kelas', 'users.id_kelas', '=', 'kelas.id')
        ->select('users.*', 'tipes.nama_tipe', 'kelas.nama_kelas')
        ->get();
        $kabupaten = DB::table("kabupatens")->get();

        $tipeCounts = $users->countby('nama_tipe');

        $labels = $tipeCounts->keys()->toArray();
        $values = $tipeCounts->values()->toArray();

        $tahunCounts = $users->pluck('tahun_penerimaan')->countBy();

        $label = $tahunCounts->keys()->toArray();
        $value = $tahunCounts->values()->toArray();

        return view('dataMerek.data_merek', compact('kabupaten', 'users', 'labels', 'values', 'label', 'value'));
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
        'foto_sertifikat' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'longitude' => 'required',
        'latitude' => 'required',
    ]);

    // $imageName = time() . '.' . $request->gambar_merek->extension();
    // $request->gambar_merek->move(public_path('merek'), $imageName);

    $Sertifikat = time() . '.' . $request->foto_sertifikat->extension();
    $request->foto_sertifikat->move(public_path('sertifikat'), $Sertifikat);

    $imageName = time() . '.' . $request->gambar_merek->extension();
    $request->gambar_merek->move(public_path('merek'), $imageName);

    $newUser = new User();
    $newUser->nomor_pemohon = $request->nomor_pemohon;
    $newUser->nama_pemilik = $request->nama_pemilik;
    $newUser->nomor_telepon = $request->nomor_telepon;
    $newUser->email = $request->email;
    $newUser->nama_merek = $request->nama_merek;
    $newUser->tahun_penerimaan = $request->tahun_penerimaan;
    $newUser->id_tipe = $request->id_tipe;
    $newUser->id_kelas = $request->id_kelas;
    $newUser->gambar_merek = $imageName;
    $newUser->foto_sertifikat = $Sertifikat;
    $newUser->id_kabupaten = $request->id_kabupaten;
    $newUser->latitude = $request->latitude;
    $newUser->longitude = $request->longitude;
    $newUser->save();

    return redirect('addData')->with('success', 'Register berhasil, tunggu konfirmasi dari admin');
}

public function showDataMerek()
{
    $users = User::join('kabupatens', 'users.id_kabupaten', '=', 'kabupatens.id')
        ->join('tipes', 'users.id_tipe', '=', 'tipes.id')
        ->join('kelas', 'users.id_kelas', '=', 'kelas.id')
        ->select('users.*', 'kabupatens.nama_kabupaten as nama_kabupaten', 'tipes.nama_tipe', 'kelas.nama_kelas')
        ->get();

    $jumlahData = User::count();

    return view('admin.notifikasi', compact('users'));
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

    public function terimaData($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->id_status = 1;
            $user->save();
            return response()->json(['message' => 'Data berhasil diterima'], 200);
        }

        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }


}