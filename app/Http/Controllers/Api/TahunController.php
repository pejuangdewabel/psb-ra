<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Tahun_ajaran;
use Illuminate\Http\Request;

class TahunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tahun_ajaran::select('id', 'date1', 'date2')->latest()->get();
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
            'required'  => 'wajib diisi!!!',
            'integer'   => 'wajib angka',
            'min'       => 'harus diisi minimal :min karakter!!!',
            'max'       => 'harus diisi maksimal :max karakter!!!',
        ];
        $this->validate($request, [
            'date1'            => 'required|integer',
            'date2'            => 'required|integer',
        ], $messages);
        $data = $request->all();
        return Tahun_ajaran::create($data);
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
            'required'  => 'wajib diisi!!!',
            'integer'   => 'wajib angka',
            'min'       => 'harus diisi minimal :min karakter!!!',
            'max'       => 'harus diisi maksimal :max karakter!!!',
        ];
        $this->validate($request, [
            'date1'            => 'required|integer',
            'date2'            => 'required|integer',
        ], $messages);
        $editKelas = $request->all();
        $data = Tahun_ajaran::findOrFail($id);
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
        $data = Tahun_ajaran::findOrFail($id);
        $data->delete();
    }
}
