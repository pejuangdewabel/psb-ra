<?php

namespace App\Http\Controllers\Login;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Tahun_ajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('layouts.login');
    }

    public function postLogin(Request $request)
    {
        // dd($request->all());
        if (Auth::guard('user')->attempt([
            'nik'       => $request->username,
            'password'  => $request->password
        ])) {
            return redirect()->route('index-user')->with('success', 'Berhasil Login');
        } elseif (Auth::guard('admin')->attempt([
            'username'       => $request->username,
            'password'       => $request->password
        ])) {
            return redirect()->route('index-admin')->with('success', 'Berhasil Login');
        }

        return redirect()->back()->with('toast_error', 'Username dan Password Salah');
    }

    public function registration()
    {
        return view('layouts.registration');
    }
    public function logout()
    {
        if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        } elseif (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }
        return redirect()->route('login')->with('toast_success', 'Berhasil Keluar');
    }
    public function showPassword()
    {
        $tahun = Tahun_ajaran::latest()->limit(1)->get();
        return view('pages.admin.password', [
            'tahun' => $tahun
        ]);
    }
    public function changePassword(Request $request)
    {
        // $messages = [
        //     'required'  => ':attribute wajib diisi!!!',
        //     'min'       => ':attribute harus diisi minimal :min karakter!!!',
        //     'max'       => ':attribute harus diisi maksimal :max karakter!!!',
        //     'unique'    => ':attribute sudah ada',
        // ];


        $this->validate($request, [
            'passwordOld'               => 'required|string',
            'passwordNew'               => 'required|min:5|string',
            'passwordKonfirmasi'        => 'required|min:5|same:passwordNew'
        ]);

        if (!Hash::check($request->passwordOld, Auth::guard('admin')->user()->password)) {

            return redirect()->back()->with('success', 'Password Lama Salah');
        } else {

            $dataAdmin = array(
                'password'      => Hash::make($request->passwordNew),
            );

            $admin = Admin::findOrFail($request->id);
            $admin->update($dataAdmin);

            return redirect()->back()->with('success', 'Password Berhasil Diubah');
        }
    }
}
