<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // Define the table name explicitly if needed
    protected $table = 'users';

    // Define the fillable attributes
    protected $fillable = [
        'id_tipe',
        'id_kelas',
        'id_kabupaten',
        'nomor_pemohon',
        'nama_pemilik',
        'nomor_telepon',
        'email',
        'nama_merek',
        'tahun_penerimaan',
        'gambar_merek',
        'foto_sertifikat',
        'longitude',
        'latitude',
    ];
}