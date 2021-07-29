<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Informasi;
use App\Tahun_ajaran;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $tahun      = Tahun_ajaran::latest()->limit(1)->get();

        foreach ($tahun as $t) {
            $pengumuman = Informasi::where('id_thn_ajaran', $t->id)->get();
        }

        return view('layouts.landing-page', [
            'tahun'         => $tahun,
            'pengumuman'    => $pengumuman
        ]);
    }
}
