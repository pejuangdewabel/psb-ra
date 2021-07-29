<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'LandingPage\LandingPageController@index')->name('landing-page');
Route::get('/login', 'Login\LoginController@index')->name('login');
Route::get('/pendaftaran-akun', 'Login\LoginController@registration')->name('registration');
Route::post('/daftar', 'Login\RegisterController@daftar')->name('daftar');
Route::post('/post-login', 'Login\LoginController@postLogin')->name('post-login');
Route::get('/logout-login', 'Login\LoginController@logout')->name('logout-login');
Route::get('/show-password', 'Login\LoginController@showPassword')->name('show-pass');
Route::post('/update-password', 'Login\LoginController@changePassword')->name('change-pass');

Route::get('/admin', 'Admin\AdminController@index')->name('index-admin');
Route::get('/admin/data/kelas', 'Admin\AdminController@kelas')->name('kelas-admin');
Route::get('/admin/data/tahun', 'Admin\AdminController@tahun')->name('tahun-admin');
Route::get('/admin/data/informasi', 'Admin\AdminController@informasi')->name('informasi-admin');
Route::get('/admin/data/pendaftar', 'Admin\AdminController@pendaftar')->name('pendaftar-admin');
Route::get('/admin/data/kelulusan', 'Admin\AdminController@kelulusan')->name('kelulusan-admin');
Route::get('/admin/pengguna/user', 'Admin\AdminController@user')->name('user-admin');
Route::get('/admin/pengguna/admin', 'Admin\AdminController@admin')->name('admin-admin');

Route::get('/user', 'User\UserCOntroller@index')->name('index-user');
Route::get('/user/pendaftaran/biodata', 'User\UserController@biodata')->name('bio-user');

Route::resource('/user/postpendaftaran', 'User\PendaftaranController');
Route::resource('/user/postasalsekolah', 'User\AsalSekolahController');

Route::get('/print/kartu-pendaftaran', 'User\UserController@printCard')->name('print');
Route::get('/user/changePassword', 'User\UserController@changePassword')->name('password-user');
Route::post('/user/updatePassword', 'User\UserController@updatePassword')->name('password-user-update');
