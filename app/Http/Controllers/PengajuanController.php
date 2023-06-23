<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\Permintaan; // Import model Permintaan
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;




class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuan = DB::table("pengajuans")->get();


        return view('daftar_diri',
        compact('pengajuan'));
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pemilik' => 'required',
            'nomor_telepon' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'gambar_merek' => 'required|image|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imageName = time() . '.' . $request->gambar_merek->extension();
        $request->gambar_merek->move(public_path('merek_gambar'), $imageName);

        $pengajuan = DB::table('pengajuans')->insert([
            'nama_pemilik' => $request->nama_pemilik,
            'nomor_telepon' => $request->nomor_telepon,
            'nama_merek' => $request->nama_merek,
            'gambar_merek' => $imageName,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        return redirect('daftardiri')->with('success', 'Mohon bersabar, layanan kami akan segera membantu!');

    }


    public function delete($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        if ($pengajuan) {
            $pengajuan->delete();
            return back()->with('success', 'Data berhasil dihapus');
        } else {
            return back()->with('error', 'Data tidak ditemukan');
        }
    }


    public function destroy(Pengajuan $id)
    {
        $id->delete();
        return redirect()->route('pengajuan');
    }


    public function dashboard() {

        $pengajuan = DB::table("pengajuans")->get();
        $kabupaten = DB::table("kabupatens")->get();

        return view('admin/beranda',
        compact('pengajuan', 'kabupaten'));
    }

    public function show($id) {
        $data = Pengajuan::find($id);

        return view('admin.detailPermintaan', ['data' => $data]);
    }
}