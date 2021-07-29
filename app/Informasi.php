<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    protected $table = 'informasi';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_thn_ajaran',
        'pendaftaran_awal',
        'pendaftaran_akhir',
        'pengumuman',
        'daftar_ulang_awal',
        'daftar_ulang_akhir'
    ];

    protected $hidden = [];

    public function tahun()
    {
        return $this->belongsTo(Tahun_ajaran::class, 'id_thn_ajaran', 'id');
    }
}
