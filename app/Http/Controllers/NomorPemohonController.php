<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class NomorPemohonController extends Controller
{
    public function cekData(Request $request)
    {
        $nomorPemohon = $request->input('nomor-pemohon');

        $data = User::where('nomor_pemohon', $nomorPemohon)->first();

        if ($data) {
            return view('hasil', ['data' => $data]);
        } else {
            return view('not_found')->with('nomorPemohon', $nomorPemohon);
        }
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);

    // Validasi input
    $request->validate([
        'id_tipe' => 'required',
        'id_kelas' => 'required',
        'id_kabupaten' => 'required',
        'nomor_pemohon' => 'required',
        'nama_pemilik' => 'required',
        'nomor_telepon' => 'required',
        'email' => 'required',
        'nama_merek' => 'required',
        'tahun_penerimaan' => 'required',
        'longitude' => 'required',
        'latitude' => 'required', // Atau aturan validasi lainnya
        // Validasi untuk kolom-kolom lainnya
    ]);

    // Update nilai-nilai kolom dengan data yang dikirim dari form
    $data->nomor_pemohon = $request->nomor_pemohon;
    $data->nama_pemilik = $request->nama_pemilik;
    $data->nomor_telepon = $request->nomor_telepon;
    $data->email = $request->email;
    $data->nama_merek = $request->nama_merek;
    $data->tahun_penerimaan = $request->tahun_penerimaan;
    $data->id_tipe = $request->id_tipe;
    $data->id_kelas = $request->id_kelas;
    $data->id_kabupaten = $request->id_kabupaten;
    $data->latitude = $request->latitude;
    $data->longitude = $request->longitude;
    // Update kolom-kolom lainnya sesuai kebutuhan

    // Simpan perubahan ke database
    $data->save();

    return redirect()->route('dataMerek')->with('success', 'Data berhasil diperbarui!');
    }
}
