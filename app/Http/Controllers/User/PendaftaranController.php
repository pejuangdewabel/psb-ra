<?php

namespace App\Http\Controllers\User;

use App\Calon_siswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PendaftaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal_lahir_cs'          => 'required',
            'tempat_lahir_cs'           => 'required',
            'jenis_kelamin_cs'          => 'required',
            'agama_cs'                  => 'required',
            'status_anak_cs'            => 'required',
            'anake_cs'                  => 'required',
            'jumlah_saudara_cs'         => 'required',
            'bahasa_cs'                 => 'required',
            'alamat_cs'                 => 'required',
            'kot_kab_cs'                => 'required',
            'prov_cs'                   => 'required',
            'kode_pos_cs'               => 'required',
            'no_hp_cs'                  => 'required',
            'nama_ayah_cs'              => 'required',
            'tanggal_lahir_ayah_cs'     => 'required',
            'pekerjaan_ayah_cs'         => 'required',
            'notelp_ayah_cs'            => 'required',
            'penghasilan_ayah_cs'       => 'required',
            'pendidikan_ayah_cs'        => 'required',
            'nama_ibu_cs'               => 'required',
            'tanggal_lahir_ibu_cs'      => 'required',
            'pekerjaan_ibu_cs'          => 'required',
            'notelp_ibu_cs'             => 'required',
            'penghasilan_ibu_cs'        => 'required',
            'pendidikan_ibu_cs'         => 'required',
            'alamat_orangtua_cs'        => 'required',
            'akte_kelahiran_cs'         => 'required|mimes:jpeg,jpg,png',
            'kartu_keluarga_cs'         => 'required|mimes:jpeg,jpg,png',
            'pas_foto_cs'               => 'required|mimes:jpeg,jpg,png',

        ]);
        // 'nama_wali_cs'              => 'required',
        // 'tanggal_lahir_wali_cs'     => 'required',
        // 'pekerjaan_wali_cs'         => 'required',
        // 'notelp_ibu_wali'           => 'required',
        // 'penghasilan_wali_cs'       => 'required',
        // 'pendidikan_wali_cs'        => 'required',
        // 'alamat_wali_cs'            => 'required',


        $nik = Auth::guard('user')->user()->nik;
        $cutNik = substr($nik, -6);
        $tahun = date("Y");
        $nopendaftaran = 'PBS' . $tahun . $cutNik . mt_rand(100, 999);

        // $data['akte']       = $request->file('akte_kelahiran_cs')->store('assets/' . $nopendaftaran, 'public');
        // $data['ijazah']     = $request->file('ijazah_skl_cs')->store('assets/' . $nopendaftaran, 'public');
        // $data['kk']         = $request->file('kartu_keluarga_cs')->store('assets/' . $nopendaftaran, 'public');
        // $data['foto']       = $request->file('pas_foto_cs')->store('assets/' . $nopendaftaran, 'public');

        $data = array(
            'no_pendaftaran'            => $nopendaftaran,
            'user_id'                   => $request->user_id,
            'tgl_lahir_siswa'           => $request->tanggal_lahir_cs,
            'tmpt_lahir_siswa'          => $request->tempat_lahir_cs,
            'jk_siswa'                  => $request->jenis_kelamin_cs,
            'agama_siswa'               => $request->agama_cs,
            'status_anak_siswa'         => $request->status_anak_cs,
            'anak_ke'                   => $request->anake_cs,
            'jml_saudara'               => $request->jumlah_saudara_cs,
            'bahasa_siswa'              => $request->bahasa_cs,
            'alamat_siswa'              => $request->alamat_cs,
            'kabupaten_kota_siswa'      => $request->kot_kab_cs,
            'provinsi_siswa'            => $request->prov_cs,
            'kode_pos_siswa'            => $request->kode_pos_cs,
            'no_hp_siswa'               => $request->no_hp_cs,
            'nama_ayah_siswa'           => $request->nama_ayah_cs,
            'tgl_lahir_ayah'            => $request->tanggal_lahir_ayah_cs,
            'pekerjaan_ayah_siswa'      => $request->pekerjaan_ayah_cs,
            'nohp_ayah_siswa'           => $request->notelp_ayah_cs,
            'penghasilan_ayah_siswa'    => $request->penghasilan_ayah_cs,
            'pendidikan_ayah_siswa'     => $request->pendidikan_ayah_cs,
            'nama_ibu_siswa'            => $request->nama_ibu_cs,
            'tgl_lahir_ibu'             => $request->tanggal_lahir_ibu_cs,
            'pekerjaan_ibu_siswa'       => $request->pekerjaan_ibu_cs,
            'nohp_ibu_siswa'            => $request->notelp_ibu_cs,
            'penghasilan_ibu_siswa'     => $request->penghasilan_ibu_cs,
            'pendidikan_ibu_siswa'      => $request->pendidikan_ibu_cs,
            'alamat_ortu'               => $request->alamat_orangtua_cs,
            'nama_wali_siswa'           => $request->nama_wali_cs,
            'tgl_lahir_wali'            => $request->tanggal_lahir_wali_cs,
            'pekerjaan_wali_siswa'      => $request->pekerjaan_wali_cs,
            'nohp_wali_siswa'           => $request->notelp_ibu_wali,
            'penghasilan_wali_siswa'    => $request->penghasilan_wali_cs,
            'pendidikan_wali_siswa'     => $request->pendidikan_wali_cs,
            'alamat_wali'               => $request->alamat_wali_cs,
            'akte'                      => $request->file('akte_kelahiran_cs')->store('assets/' . $nopendaftaran, 'public'),
            'kk'                        => $request->file('kartu_keluarga_cs')->store('assets/' . $nopendaftaran, 'public'),
            'foto'                      => $request->file('pas_foto_cs')->store('assets/' . $nopendaftaran, 'public'),

        );
        Calon_siswa::create($data);

        return response()->json([
            'success'   => true,
            'message'   => 'Berhasil Menyimpan Data Kategori'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
