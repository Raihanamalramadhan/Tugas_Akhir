<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => '11111',
            'id_status' => '1',
            'id_tipe' => '1',
            'id_kelas' => '1',
            'id_kabupaten' => '1',
            'password' => Hash::make('12345'),
            'nomor_pemohon' => 'Kementerian Hukum dan HAM',
            'nama_pemilik' => '1',
            'nomor_telepon' => '082276745102',
            'email' => 'kemenkumhan@gmail.com',
            'nama_merek' => 'Kemenkumhan',
            'tahun_penerimaan' => '2021',
            'gambar_merek' => 'ww',
            'foto_sertifikat' => 'ww',
            'longitude' => '283928932',
            'latitude' => '7239872398',
        ]);
    }
}