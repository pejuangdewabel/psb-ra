<?php

namespace App\Http\Controllers\User;

use App\Calon_siswa;
use App\Http\Controllers\Controller;
use App\Informasi;
use App\Tahun_ajaran;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }
    public function index()
    {
        $tahun = Tahun_ajaran::orderBy('id', 'desc')->limit(1)->get();
        foreach ($tahun as $t) {
            $pengumuman = Informasi::where('id_thn_ajaran', $t->id)->get();
        }
        $no = Calon_siswa::where('user_id', Auth::guard('user')->user()->id)->count();
        return view('pages.user.index', [
            'tahun'         => $tahun,
            'pengumuman'    => $pengumuman,
            'no'            => $no
        ]);
    }
    public function biodata()
    {
        $cekBio = Calon_siswa::where('user_id', Auth::guard('user')->user()->id)
            ->where('tgl_lahir_siswa', '!=', null)
            ->count();

        $cekOrangTua = Calon_siswa::where('user_id', Auth::guard('user')->user()->id)
            ->where('nama_ayah_siswa', '!=', null)
            ->where('nama_ibu_siswa', '!=', null)
            ->where('nama_wali_siswa', '!=', null)
            ->count();

        $dataUser = Calon_siswa::where('user_id', Auth::guard('user')->user()->id)
            ->with(['relasiUser'])
            ->get();

        $statusData = Calon_siswa::where('user_id', Auth::guard('user')->user()->id)->get();


        $tahun = Tahun_ajaran::orderBy('id', 'desc')->limit(1)->get();
        return view('pages.user.biodata', [
            'tahun'             => $tahun,
            'cekBio'            => $cekBio,
            'cekOrangTua'       => $cekOrangTua,
            'dataUser'          => $dataUser,
            'status'            => $statusData,
        ]);
    }

    public function printCard()
    {
        $dataUser = Calon_siswa::where('user_id', Auth::guard('user')->user()->id)
            ->with(['relasiUser'])
            ->get();
        $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate('string'));
        $tahun = Tahun_ajaran::orderBy('id', 'desc')->limit(1)->get();
        // $pdf = PDF::loadview('pages.user.print', [
        //     'dataUser' => $dataUser,
        //     'qrcode'   => $qrcode
        // ])->setPaper('A4', 'potrait');
        // return $pdf->stream('cetak-kartu' . '_' . Auth::guard('user')->user()->nik . '_' . Auth::guard('user')->user()->nama);
        return view('pages.user.print', [
            'qrcode'    => $qrcode,
            'dataUser'  => $dataUser,
            'tahun'     => $tahun
        ]);
    }

    public function changePassword()
    {
        return view('pages.user.password');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'passwordOld'               => 'required|string',
            'passwordNew'               => 'required|min:5|string',
            'passwordKonfirmasi'        => 'required|min:5|same:passwordNew'
        ]);

        if (!Hash::check($request->passwordOld, Auth::guard('user')->user()->password)) {

            return redirect()->back()->with('success', 'Password Lama Salah');
        } else {

            $dataAdmin = array(
                'password'      => Hash::make($request->passwordNew),
            );

            $admin = User::findOrFail($request->id);
            $admin->update($dataAdmin);

            return redirect()->back()->with('success', 'Password Berhasil Diubah');
        }
    }
}
