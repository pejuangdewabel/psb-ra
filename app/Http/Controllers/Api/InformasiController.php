<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Informasi::with([
            'tahun'
        ])->latest()->get();
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
        $messages = [
            'required'  => ':attribute wajib diisi!!!',
        ];
        $this->validate($request, [
            'id_thn_ajaran'             => 'required',
            'pendaftaran_awal'          => 'required|date',
            'pendaftaran_akhir'         => 'required|date',
            'pengumuman'                => 'required|date',
            'daftar_ulang_awal'         => 'required|date',
            'daftar_ulang_akhir'         => 'required|date',
        ], $messages);
        $data = $request->all();
        return Informasi::create($data);
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
        $messages = [
            'required'  => ':attribute wajib diisi!!!',
        ];
        $this->validate($request, [
            'id_thn_ajaran'             => 'required',
            'pendaftaran_awal'          => 'required|date',
            'pendaftaran_akhir'         => 'required|date',
            'pengumuman'                => 'required|date',
            'daftar_ulang_awal'         => 'required|date',
            'daftar_ulang_akhir'         => 'required|date',
        ], $messages);

        $editInformasi = $request->all();
        $data = Informasi::findOrFail($id);
        $data->update($editInformasi);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Informasi::findOrFail($id);
        $data->delete();
    }
}
