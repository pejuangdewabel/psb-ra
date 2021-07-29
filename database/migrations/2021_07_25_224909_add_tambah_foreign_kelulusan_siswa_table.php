<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTambahForeignKelulusanSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kelulusan_siswa', function (Blueprint $table) {
            $table->bigInteger('tahunajaran')->unsigned();
            $table->string('nama_kelas');
            $table->string('nopendaftaran');
            $table->foreign('tahunajaran')->references('id')->on('tahun_ajaran')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nama_kelas')->references('kode_kelas')->on('kelas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nopendaftaran')->references('no_pendaftaran')->on('calon_siswa')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kelulusan_siswa', function (Blueprint $table) {
            //
        });
    }
}
