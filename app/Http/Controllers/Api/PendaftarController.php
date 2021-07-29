<?php

namespace App\Http\Controllers\Api;

use App\Calon_siswa;
use App\Http\Controllers\Controller;
use App\Kelulusan;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun = date("Y");
        $data = Calon_siswa::whereYear('created_at', $tahun)
            ->where('status_kelulusan', '0')
            ->with(['relasiUser'])
            ->latest()
            ->get();
        return $data;
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
        $data = Calon_siswa::where('no_pendaftaran', $request->no_pendaftaran);
        $edit = array(
            'status_kelulusan' => '2'
        );
        $data->update($edit);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Calon_siswa::where([
            'no_pendaftaran'    => $id,
            'status_kelulusan'  => '0'
        ])->with(['relasiUser'])->get();
        return $data;
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
        $dataKelulusan = array(
            'tahunajaran' => $request->tahunajaran,
            'nopendaftaran' => $request->no_pendaftaran,
            'nama_kelas' => $request->nama_kelas,
        );
        Kelulusan::create($dataKelulusan);


        $data = Calon_siswa::where('no_pendaftaran', $id);
        $edit = array(
            'status_kelulusan' => '1'
        );
        $data->update($edit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Calon_siswa::where('no_pendaftaran', $id);
        $data->delete();
    }
}
