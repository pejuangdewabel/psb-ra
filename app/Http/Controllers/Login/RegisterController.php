<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function daftar(Request $request)
    {
        $messages = [
            'required'  => ':attribute wajib diisi!',
            'min'       => ':attribute harus diisi minimal :min karakter!',
            'max'       => ':attribute harus diisi maksimal :max karakter!',
            'unique'    => ':attribute sudah ada',
            'same'      => 'password tidak sama',
        ];
        $this->validate($request, [
            'nik'               => 'required|string|unique:users,nik|min:16|max:16',
            'namalengkap'       => 'required|string',
            'password'          => 'required|string|min:5',
            'confirmpassword'   => 'required|string|same:password',

        ], $messages);

        $data = array(
            'nik'       => $request->nik,
            'nama'      => $request->namalengkap,
            'password'  => Hash::make($request->password)
        );
        User::create($data);
        return redirect()->route('login')->with('success', 'Berhasil Membuat Akun');
    }
}
