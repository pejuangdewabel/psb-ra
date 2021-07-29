<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelulusan extends Model
{
    use SoftDeletes;
    protected $table = 'kelulusan_siswa';

    protected $fillable = [
        'id',
        'tahunajaran',
        'nopendaftaran',
        'nama_kelas',
    ];

    protected $hidden = [];

    public function thAjaran()
    {
        return $this->belongsTo(Tahun_ajaran::class, 'tahunajaran', 'id');
    }
    public function pendaftaran()
    {
        return $this->belongsTo(Calon_siswa::class, 'nopendaftaran', 'no_pendaftaran');
    }
    public function namaKelas()
    {
        return $this->belongsTo(Kelas::class, 'nama_kelas', 'kode_kelas');
    }
}
