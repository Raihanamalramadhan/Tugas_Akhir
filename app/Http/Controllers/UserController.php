<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function cekData(Request $request)
    {
        $nomorPemohon = $request->input('nomor-pemohon');

        $data = User::where('nomor_pemohon', $nomorPemohon)->first();

        if ($data) {
            return redirect()->route('usermerek', ['nomor_pemohon' => $nomorPemohon]);
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function showUserMerek($nomorPemohon)
    {
        $data = User::where('nomor_pemohon', $nomorPemohon)->first();

        return view('dataMerek.user_merek', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_pemilik' => 'required',
            'nomor_telepon' => 'required',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = User::findOrFail($id);
        $data->nama_pemilik = $request->input('nama_pemilik');
        $data->nomor_telepon = $request->input('nomor_telepon');
        $data->email = $request->input('email');
        $data->save();

        return redirect('/dataMerek')->with('success', 'Data berhasil diperbarui');
    }
}