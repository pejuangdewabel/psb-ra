<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tahun_ajaran extends Model
{
    protected $table = 'tahun_ajaran';
    protected $primaryKey = 'id';

    protected $fillable = [
        'date1',
        'date2'
    ];

    protected $hidden = [];
}
