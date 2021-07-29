<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Kelas::select('kode_kelas', 'kapasitas_kelas')->get();
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
            'min'       => ':attribute harus diisi minimal :min karakter!!!',
            'max'       => ':attribute harus diisi maksimal :max karakter!!!',
            'unique'    => ':attribute sudah ada',
        ];
        $this->validate($request, [
            'kode_kelas'            => 'required|max:2|string|unique:kelas,kode_kelas',
            'kapasitas_kelas'         => 'required|integer'
        ], $messages);
        $data = $request->all();
        return Kelas::create($data);
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
        $messages = [
            'required'  => ':attribute wajib diisi!!!',
            'min'       => ':attribute harus diisi minimal :min karakter!!!',
            'max'       => ':attribute harus diisi maksimal :max karakter!!!',
            'unique'    => ':attribute sudah ada',
        ];
        $this->validate($request, [
            'kode_kelas'            => 'required|max:2|string',
            'kapasitas_kelas'         => 'required|integer'
        ], $messages);

        $editKelas = $request->all();
        $data = Kelas::where('kode_kelas', $id);
        $data->update($editKelas);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kelas::where('kode_kelas', $id);
        $data->delete();
    }
}
