<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_status')->index();
            $table->foreign('id_status')->references('id')->on('statuses')->onDelete('cascade');
            $table->unsignedBigInteger('id_tipe')->index();
            $table->foreign('id_tipe')->references('id')->on('tipes')->onDelete('cascade');
            $table->unsignedBigInteger('id_kelas')->index();
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
            $table->unsignedBigInteger('id_kabupaten')->index();
            $table->foreign('id_kabupaten')->references('id')->on('kabupatens')->onDelete('cascade');
            $table->string('password');
            $table->string('nomor_pemohon');
            $table->string('nomor_pemilik');
            $table->string('nomor_telepon');
            $table->string('email');
            $table->string('nama_merek');
            $table->string('tahun_penerimaan');
            $table->string('gambar_merek');
            $table->string('foto_sertifikat');
            $table->string('longitude');
            $table->string('latitude');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}