<?php

namespace App\Http\Controllers\Api;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Admin::latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'username'              => 'required|string|unique:admin,username',
            'nama'                  => 'required|string',
            'password'              => 'required|string|min:5'
        ], $messages);

        $dataAdmin = array(
            'username'      => $request->username,
            'nama'          => $request->nama,
            'password'      => bcrypt($request->password),
        );

        Admin::create($dataAdmin);
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
            'username'              => 'required|string',
            'nama'                  => 'required|string',
            'password'              => 'required|string|min:5'
        ], $messages);

        $dataAdmin = array(
            'username'      => $request->username,
            'nama'          => $request->nama,
            'password'      => bcrypt($request->password),
        );

        $data = Admin::findOrFail($id);
        $data->update($dataAdmin);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Admin::findOrFail($id);
        $data->delete();
    }
}
