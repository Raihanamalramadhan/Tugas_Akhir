<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use App\Models\Kelas;
use App\Models\Kabupaten;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class MerekController extends Controller
{
    public function index()
    {
        $users = User::all(); // Mengambil data dari tabel "users"
        return view('admin.datamerek', compact('users'));
    }

    public function create()
    {
        $kelas = Kelas::get();
        $tipe = Tipe::get();
        $kabupaten = Kabupaten::get();
        return view('admin.tambah', compact('kelas', 'tipe', 'kabupaten'));
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
        'longitude' => 'required',
        'latitude' => 'required',
    ]);

    $imageName = time() . '.' . $request->gambar_merek->extension();
    $request->gambar_merek->move(public_path('merek'), $imageName);

    $newUser = new User();
    $newUser->id_status = 1;
    $newUser->nomor_pemohon = $request->nomor_pemohon;
    $newUser->nama_pemilik = $request->nama_pemilik;
    $newUser->nomor_telepon = $request->nomor_telepon;
    $newUser->email = $request->email;
    $newUser->nama_merek = $request->nama_merek;
    $newUser->tahun_penerimaan = $request->tahun_penerimaan;
    $newUser->id_tipe = $request->id_tipe;
    $newUser->id_kelas = $request->id_kelas;
    $newUser->gambar_merek = $imageName;
    $newUser->id_kabupaten = $request->id_kabupaten;
    $newUser->latitude = $request->latitude;
    $newUser->longitude = $request->longitude;
    $newUser->save();

    return redirect('/tambah')->with('success', 'Terima kasih atas penambahan data');
}
    public function showDataMerek()
    {
        $users = User::join('kabupatens', 'users.id_kabupaten', '=', 'kabupatens.id')
            ->join('tipes', 'users.id_tipe', '=', 'tipes.id')
            ->join('kelas', 'users.id_kelas', '=', 'kelas.id')
            ->select('users.*', 'kabupatens.nama_kabupaten as nama_kabupaten', 'tipes.nama_tipe', 'kelas.nama_kelas')
            ->get();

        $jumlahData = User::count();

        return view('admin.datamerek', compact('users'));
    }

    public function destroy()
    {

    }

    public function edit($id)
    {
        $editdata = User::find($id);
        $selectededit=DB::table('users')
        ->join('kabupatens', 'users.id_kabupaten', '=', 'kabupatens.id')
        ->join('tipes', 'users.id_tipe', '=', 'tipes.id')
        ->join('kelas', 'users.id_kelas', '=', 'kelas.id')
        ->select('users.*', 'kabupatens.nama_kabupaten as nama_kabupaten', 'tipes.nama_tipe', 'kelas.nama_kelas')
        ->get();

        $kelas = Kelas::get();
        $tipe = Tipe::get();
        $kabupaten = Kabupaten::get();

        return view ('admin.edit_data', compact('editdata','selectededit','tipe','kelas','kabupaten'));

    }

    public function update(Request $request, $id)
    {
        $editdata = User::find($id);
        $editdata->update($request->all());
        // dd($fasilitas);
        return redirect ('/datamerek');
    }

}