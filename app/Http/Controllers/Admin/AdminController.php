<?php

namespace App\Http\Controllers\Admin;

use App\Calon_siswa;
use App\Http\Controllers\Controller;
use App\Tahun_ajaran;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $pendaftar = Calon_siswa::count();
        $sukses = Calon_siswa::where(
            'akte',
            '!=',
            null
        )->count();
        $lulus = Calon_siswa::where(
            'status_kelulusan',
            '1'
        )->count();
        $tidaklulus = Calon_siswa::where(
            'status_kelulusan',
            '2'
        )->count();
        $dataStatistik = collect([
            [
                'pendaftar'     => $pendaftar,
                'sukses'        => $sukses,
                'lulus'         => $lulus,
                'tidaklulus'    => $tidaklulus
            ],
        ]);
        $tahun = Tahun_ajaran::latest()->limit(1)->get();
        return view('pages.admin.index', [
            'tahun'         => $tahun,
            'dataStatistik' => $dataStatistik
        ]);
    }

    public function kelas()
    {
        $tahun = Tahun_ajaran::latest()->limit(1)->get();
        return view('pages.admin.kelas', [
            'tahun' => $tahun
        ]);
    }

    public function tahun()
    {
        $tahun = Tahun_ajaran::latest()->limit(1)->get();
        return view('pages.admin.tahun', [
            'tahun' => $tahun
        ]);
    }

    public function informasi()
    {
        $tahun = Tahun_ajaran::latest()->limit(1)->get();
        return view('pages.admin.informasi', [
            'tahun' => $tahun
        ]);
    }
    public function pendaftar()
    {
        $tahun = Tahun_ajaran::latest()->limit(1)->get();
        return view('pages.admin.pendaftar', [
            'tahun' => $tahun
        ]);
    }
    public function kelulusan()
    {
        $tahun = Tahun_ajaran::latest()->limit(1)->get();
        return view('pages.admin.diterima', [
            'tahun' => $tahun
        ]);
    }
    public function user()
    {
        $tahun = Tahun_ajaran::latest()->limit(1)->get();
        return view('pages.admin.user', [
            'tahun' => $tahun
        ]);
    }
    public function admin()
    {
        $tahun = Tahun_ajaran::latest()->limit(1)->get();
        return view('pages.admin.admin', [
            'tahun' => $tahun
        ]);
    }
}
