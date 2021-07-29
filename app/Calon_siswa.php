<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calon_siswa extends Model
{
    use SoftDeletes;
    protected $table = 'calon_siswa';

    protected $fillable = [
        'no_pendaftaran',
        'user_id',
        'tgl_lahir_siswa',
        'tmpt_lahir_siswa',
        'jk_siswa',
        'agama_siswa',
        'status_anak_siswa',
        'anak_ke',
        'jml_saudara',
        'bahasa_siswa',
        'alamat_siswa',
        'kabupaten_kota_siswa',
        'provinsi_siswa',
        'kode_pos_siswa',
        'no_hp_siswa',
        'nama_ayah_siswa',
        'tgl_lahir_ayah',
        'pekerjaan_ayah_siswa',
        'nohp_ayah_siswa',
        'penghasilan_ayah_siswa',
        'pendidikan_ayah_siswa',
        'nama_ibu_siswa',
        'tgl_lahir_ibu',
        'pekerjaan_ibu_siswa',
        'nohp_ibu_siswa',
        'penghasilan_ibu_siswa',
        'pendidikan_ibu_siswa',
        'alamat_ortu',
        'nama_wali_siswa',
        'tgl_lahir_wali',
        'pekerjaan_wali_siswa',
        'nohp_wali_siswa',
        'penghasilan_wali_siswa',
        'pendidikan_wali_siswa',
        'alamat_wali',
        'akte',
        'kk',
        'foto',
        'status_kelulusan'
    ];

    protected $hidden = [];

    public function relasiUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getAkteAttribute($value)
    {
        return url('storage/' . $value);
    }
    public function getKkAttribute($value)
    {
        return url('storage/' . $value);
    }
    public function getFotoAttribute($value)
    {
        return url('storage/' . $value);
    }
}
