<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalonSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calon_siswa', function (Blueprint $table) {
            $table->string('no_pendaftaran')->primary();
            $table->string('nama_lengkap');
            $table->string('nik', 16);
            $table->date('tgl_lahir_siswa')->nullable();
            $table->string('tmpt_lahir_siswa')->nullable();
            $table->string('jk_siswa')->nullable();
            $table->string('agama_siswa')->nullable();
            $table->string('status_anak_siswa')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->integer('jml_saudara')->nullable();
            $table->string('bahasa_siswa')->nullable();
            $table->text('alamat_siswa')->nullable();
            $table->string('kabupaten_kota_siswa')->nullable();
            $table->string('provinsi_siswa')->nullable();
            $table->integer('kode_pos_siswa')->nullable();
            $table->string('no_hp_siswa')->nullable();
            $table->string('asal_sekolah_siswa')->nullable();
            $table->year('tahun_kelulusan_siswa')->nullable();
            $table->text('alamat_asal_sekolah')->nullable();

            $table->string('nama_ayah_siswa')->nullable();
            $table->date('tgl_lahir_ayah')->nullable();
            $table->string('pekerjaan_ayah_siswa')->nullable();
            $table->string('nohp_ayah_siswa')->nullable();
            $table->string('penghasilan_ayah_siswa')->nullable();
            $table->string('pendidikan_ayah_siswa')->nullable();

            $table->string('nama_ibu_siswa')->nullable();
            $table->date('tgl_lahir_ibu')->nullable();
            $table->string('pekerjaan_ibu_siswa')->nullable();
            $table->string('nohp_ibu_siswa')->nullable();
            $table->string('penghasilan_ibu_siswa')->nullable();
            $table->string('pendidikan_ibu_siswa')->nullable();

            $table->text('alamat_ortu')->nullable();

            $table->string('nama_wali_siswa')->nullable();
            $table->date('tgl_lahir_wali')->nullable();
            $table->string('pekerjaan_wali_siswa')->nullable();
            $table->string('nohp_wali_siswa')->nullable();
            $table->string('penghasilan_wali_siswa')->nullable();
            $table->string('pendidikan_wali_siswa')->nullable();

            $table->text('alamat_wali')->nullable();

            $table->longText('akte')->nullable();
            $table->longText('ijazah')->nullable();
            $table->longText('kk')->nullable();
            $table->longText('foto')->nullable();

            $table->integer('status_kelulusan')->nullable();
            $table->softDeletes();

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
        Schema::dropIfExists('calon_siswa');
    }
}
