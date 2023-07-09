<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DatagrafikController extends Controller
{
    public function index()
    {
        $users = User::orderBy('nama_kelas')
        ->join('tipes', 'users.id_tipe', '=', 'tipes.id')
        ->join('kelas', 'users.id_kelas', '=', 'kelas.id')
        ->select('users.*', 'tipes.nama_tipe', 'kelas.nama_kelas')
        ->get();

        $tipeCounts = $users->countby('nama_tipe');

        $labels = $tipeCounts->keys()->toArray();
        $values = $tipeCounts->values()->toArray();

        $tahunCounts = $users->pluck('tahun_penerimaan')->countBy();

        $label = $tahunCounts->keys()->toArray();
        $value = $tahunCounts->values()->toArray();

        $kelasCounts = $users->countBy('nama_kelas');

        $lebel = $kelasCounts->keys()->toArray();
        $valu = $kelasCounts->values()->toArray();


        return view('admin.persentase', compact('users', 'labels', 'values', 'label', 'value', 'lebel', 'valu'));
    }
}