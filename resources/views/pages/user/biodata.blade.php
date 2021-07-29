@extends('layouts.user',[
  'tahunAjaran' => $tahun
])

@section('content')
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          @if ($cekBio == 0 && $cekOrangTua == 0)
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">
                        <strong>Biodata Pendaftaran</strong>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">                                
                        <!-- Biodata -->
                        <div class="col-md-12" id="cardbio">                            
                            <p>Silahkan lengkapi isian biodata dengan benar</p>
                            <form id="form-bio" class="needs-validation" enctype="multipart/form-data" novalidate>
                                @csrf
                                <table class="table">
                                    <tr>
                                        <td colspan="2">
                                            <h3>1. Pengisian Biodata Diri</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::guard('user')->user()->id }}">
                                        </td>                        
                                    </tr>
                                     <tr>
                                        <td>
                                            <label for="">Nama Lengkap</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="nama_lengkap_cs"
                                                name="nama_lengkap_cs"
                                                value="{{ Auth::guard('user')->user()->nama }}"
                                                readonly
                                            />
                                        </td>
                                        <td>
                                            <label for="">NIK (Nomor Induk Kependudukan)</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="nik_cs"
                                                name="nik_cs"
                                                value="{{ Auth::guard('user')->user()->nik }}"
                                                readonly
                                            />
                                        </td>
                                    </tr>                                   
                                    <tr>
                                        <td>
                                            <label for="">Tanggal Lahir</label>
                                            <input
                                                type="date"
                                                class="form-control"
                                                id="tanggal_lahir_cs"
                                                name="tanggal_lahir_cs"
                                                required
                                            />
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Tanggal Lahir Wajib Diisi
                                            </div>
                                        </td>  
                                        <td>
                                            <label for="">Tempat Lahir</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="tempat_lahir_cs"
                                                name="tempat_lahir_cs"
                                                required
                                            />
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Tempat Lahir Wajib Diisi
                                            </div>
                                        </td>                      
                                    </tr>     
                                    <tr>
                                        <td>
                                            <label for="">Jenis Kelamin</label>
                                            <select
                                                name="jenis_kelamin_cs"
                                                id="jenis_kelamin_cs"
                                                class="form-control"
                                                required
                                            >           
                                                <option selected disabled></option>                                     
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Jenis Kelamin Wajib Diisi
                                            </div>
                                        </td>
                                        <td>
                                        <label for="">Agama</label>
                                            <select
                                                name="agama_cs"
                                                id="agama_cs"
                                                class="form-control"
                                                required
                                            >                                        
                                                <option selected disabled></option>        
                                                <option value="Islam">Islam</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Protestan">Protestan</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                            </select>
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Agama Wajib Diisi
                                            </div>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>
                                            <label for="">Status Anak</label>
                                            <select
                                                name="status_anak_cs"
                                                id="status_anak_cs"
                                                class="form-control"
                                                required
                                            >      
                                                <option selected disabled></option>                                          
                                                <option value="Kandung">Kandung</option>
                                                <option value="Bukan Kandung">Bukan Kandung</option>
                                            </select>
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Status Anak Wajib Diisi
                                            </div>
                                        </td>
                                        <td>
                                            <label for="">Anak Ke - </label>
                                            <input
                                                type="number"
                                                class="form-control"
                                                id="anake_cs"
                                                name="anake_cs"
                                                required
                                            />
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Anak Ke- Wajib Diisi
                                            </div>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>
                                            <label for="">Jumlah Saudara</label>
                                            <input
                                                type="number"
                                                class="form-control"
                                                id="jumlah_saudara_cs"
                                                name="jumlah_saudara_cs"
                                                required
                                            />
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Jumlah Saudara Wajib Diisi
                                            </div>
                                        </td>
                                        <td>
                                            <label for="">Bahasa yang digunakan</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="bahasa_cs"
                                                name="bahasa_cs"
                                                required
                                            />
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Bahasa Wajib Diisi
                                            </div>
                                        </td>
                                    </tr>   
                                    <tr>
                                        <td colspan="2">
                                            <label for="">Alamat Calon Siswa</label>
                                            <small class="badge badge-warning">
                                                Tulis alamat sesuai KTP atau KK beserta kecamatan
                                                dan kelurahan
                                            </small>
                                            <textarea
                                                class="form-control"                                                
                                                rows="4" 
                                                cols="50"
                                                name="alamat_cs"                                                
                                                required
                                            ></textarea>
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Alamat Calon Siswa Wajib Diisi
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Kota / Kabupaten</label>
                                            <input type="text"  class="form-control" name="kot_kab_cs"  id="kot_kab_cs" required>                                            
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Kota / Kabupaten Wajib Diisi
                                            </div>
                                        </td>
                                        <td>
                                            <label for="">Provinsi</label>
                                            <input type="text"  class="form-control" name="prov_cs"  id="prov_cs" required>                                            
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Provinsi Wajib Diisi
                                            </div>
                                        </td>
                                    </tr>  
                                    <tr>
                                        <td>
                                            <label for="">Kode Post</label>
                                            <input
                                                type="number"
                                                name="kode_pos_cs"
                                                id="kode_pos_cs"
                                                class="form-control"
                                                required
                                            />
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Kode Post Wajib Diisi
                                            </div>
                                        </td>
                                        <td>
                                            <label for="">No Hp</label>
                                            <input
                                                type="number"
                                                name="no_hp_cs"
                                                id="no_hp_cs"
                                                class="form-control"
                                                required
                                            />
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Agama Wajib Diisi
                                            </div>
                                        </td>
                                    </tr>                                    
                                    <tr>
                                        <td colspan="2">
                                            <h3>2. Pengisian Biodata Orang Tua atau Wali</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Nama Ayah</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="nama_ayah_cs"
                                                name="nama_ayah_cs"
                                                required
                                            />
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Nama Ayah Wajib Diisi
                                            </div>
                                        </td>
                                        <td>
                                            <label for="">Tanggal Lahir Ayah</label>
                                            <input
                                                type="date"
                                                class="form-control"
                                                id="tanggal_lahir_ayah_cs"
                                                name="tanggal_lahir_ayah_cs"
                                                required
                                            />
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Tanggal Lahir Ayah Wajib Diisi
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Pekerjaan Ayah</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="pekerjaan_ayah_cs"
                                                name="pekerjaan_ayah_cs"
                                                required
                                            />
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Pekerjaan Ayah Wajib Diisi
                                            </div>
                                        </td>
                                        <td>
                                            <label for="">No Telp Ayah</label>
                                            <input
                                                type="number"
                                                class="form-control"
                                                id="notelp_ayah_cs"
                                                name="notelp_ayah_cs"
                                                required
                                            />
                                            <div class="invalid-feedback" style="text-align: :left">
                                                No Telp Ayah Wajib Diisi
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Penghasilan Ayah</label>
                                            <input
                                                type="number"
                                                class="form-control"
                                                id="penghasilan_ayah_cs"
                                                name="penghasilan_ayah_cs"
                                                required
                                            />
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Penghasilan Ayah Wajib Diisi
                                            </div>
                                        </td>
                                        <td>
                                            <label for="">Pendidikan Terakhir Ayah</label>
                                            <select 
                                                class="form-control"
                                                id="pendidikan_ayah_cs"
                                                name="pendidikan_ayah_cs"
                                                required
                                            >
                                                <option selected disabled></option>
                                                <option value="Tidak Sekolah">Tidak Sekolah</option>
                                                <option value="Sekolah Dasar">Sekolah Dasar (SD)</option>
                                                <option value="Sekolah Menengah Pertama">Sekolah Menengah Pertama (SMP)</option>
                                                <option value="Sekolah Menengah Atas / SMU">Sekolah Menengah Atas (SMA) / SMU</option>
                                                <option value="Sarjana 1">Sarjana 1 (S1)</option>
                                                <option value="Sarjana 2">Sarjana 2 (S2)</option>
                                                <option value="Sarjana 3">Sarjana 3 (S3)</option>
                                            </select>                                            
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Pendidikan Terakhir Ayah Wajib Diisi
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Nama Ibu</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="nama_ibu_cs"
                                                name="nama_ibu_cs"
                                                required
                                            />
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Nama Ibu Wajib Diisi
                                            </div>
                                        </td>
                                        <td>
                                            <label for="">Tanggal Lahir Ibu</label>
                                            <input
                                                type="date"
                                                class="form-control"
                                                id="tanggal_lahir_ibu_cs"
                                                name="tanggal_lahir_ibu_cs"
                                                required
                                                
                                            />
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Tanggal Lahir Ibu Wajib Diisi
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <label for="">Pekerjaan Ibu</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="pekerjaan_ibu_cs"
                                                name="pekerjaan_ibu_cs"
                                                required
                                            />
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Pekerjaan Ibu Wajib Diisi
                                            </div>
                                        </td>
                                        <td>
                                            <label for="">No Telp Ibu</label>
                                            <input
                                                type="number"
                                                class="form-control"
                                                id="notelp_ibu_cs"
                                                name="notelp_ibu_cs"
                                                required
                                            />
                                            <div class="invalid-feedback" style="text-align: :left">
                                                No Telp Ibu Wajib Diisi
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Penghasilan Ibu</label>
                                            <input
                                                type="number"
                                                class="form-control"
                                                id="penghasilan_ibu_cs"
                                                name="penghasilan_ibu_cs"
                                                required
                                            />
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Penghasilan Ibu Wajib Diisi
                                            </div>
                                        </td>
                                        <td>
                                            <label for="">Pendidikan Terakhir Ibu</label>
                                            <select 
                                                class="form-control"
                                                id="pendidikan_ibu_cs"
                                                name="pendidikan_ibu_cs"
                                                required
                                            >
                                                <option selected disabled></option>
                                                <option value="Tidak Sekolah">Tidak Sekolah</option>
                                                <option value="Sekolah Dasar">Sekolah Dasar (SD)</option>
                                                <option value="Sekolah Menengah Pertama">Sekolah Menengah Pertama (SMP)</option>
                                                <option value="Sekolah Menengah Atas / SMU">Sekolah Menengah Atas (SMA) / SMU</option>
                                                <option value="Sarjana 1">Sarjana 1 (S1)</option>
                                                <option value="Sarjana 2">Sarjana 2 (S2)</option>
                                                <option value="Sarjana 3">Sarjana 3 (S3)</option>
                                            </select>                                            
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Pendidikan Terakhir Ibu Wajib Diisi
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <label for="">Alamat Orang Tua</label>
                                            <textarea
                                                name="alamat_orangtua_cs"
                                                id="alamat_orangtua_cs"
                                                class="form-control"
                                                rows="4"
                                                cols="50"
                                                required
                                            ></textarea>
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Alamat Orang Tua Wajib Diisi
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <div class="alert alert-warning">
                                                *Bila tidak ada wali tidak perlu diisi silahkan dikosongkan.
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Nama Wali</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="nama_wali_cs"
                                                name="nama_wali_cs"                                              
                                            />                                            
                                        </td>
                                            <td>
                                            <label for="">Tanggal Lahir Wali</label>
                                            <input
                                                type="date"
                                                class="form-control"
                                                id="tanggal_lahir_wali_cs"
                                                name="tanggal_lahir_wali_cs"                                                
                                            />                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Pekerjaan Wali</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="pekerjaan_wali_cs"
                                                name="pekerjaan_wali_cs"                                                
                                            />                                            
                                        </td>
                                        <td>
                                            <label for="">No Telp Wali</label>
                                            <input
                                                type="number"
                                                class="form-control"
                                                id="notelp_ibu_wali"
                                                name="notelp_ibu_wali"                                                
                                            />                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Penghasilan Wali</label>
                                            <input
                                                type="number"
                                                class="form-control"
                                                id="penghasilan_wali_cs"
                                                name="penghasilan_wali_cs"                                                
                                            />                                            
                                        </td>
                                        <td>
                                            <label for="">Pendidikan Terakhir Wali</label>
                                            <select 
                                                class="form-control"
                                                id="pendidikan_wali_cs"
                                                name="pendidikan_wali_cs"                                                
                                            >
                                                <option selected disabled></option>
                                                <option value="Tidak Sekolah">Tidak Sekolah</option>
                                                <option value="Sekolah Dasar">Sekolah Dasar (SD)</option>
                                                <option value="Sekolah Menengah Pertama">Sekolah Menengah Pertama (SMP)</option>
                                                <option value="Sekolah Menengah Atas / SMU">Sekolah Menengah Atas (SMA) / SMU</option>
                                                <option value="Sarjana 1">Sarjana 1 (S1)</option>
                                                <option value="Sarjana 2">Sarjana 2 (S2)</option>
                                                <option value="Sarjana 3">Sarjana 3 (S3)</option>
                                            </select>                                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <label for="">Alamat Orang Wali</label>
                                            <textarea
                                                name="alamat_wali_cs"
                                                id="alamat_wali_cs"
                                                class="form-control"
                                                rows="4"
                                                cols="50"                                                
                                            ></textarea>                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h3>3. Upload Berkas Dokument</h3>
                                            <p>
                                                Silahkan upload dokumen yang diperlukan file dalam bentuk
                                                <strong class="text-danger">*JPG</strong>
                                                <br />
                                                <strong class="text-danger">
                                                *Ukuran file maksimal 1000 KB
                                                </strong>
                                                <br />
                                                <strong class="text-danger">
                                                *Ukuran foto 4x6 dan berlatar belakang merah
                                                </strong>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Akte Kelahiran</td>
                                        <td>
                                            <input
                                                type="file"
                                                class="form-control"
                                                name="akte_kelahiran_cs"
                                                id="akte_kelahiran_cs"
                                            />
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Akte Kelahiran Wajib di Upload
                                            </div>
                                        </td>                                        
                                    </tr>                                    
                                    <tr>
                                        <td>Kartu Keluarga</td>
                                        <td>
                                            <input
                                                type="file"
                                                class="form-control"
                                                name="kartu_keluarga_cs"
                                                id="kartu_keluarga_cs"
                                            />
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Kartu Keluarga Wajib Di Upload
                                            </div>
                                        </td>                                        
                                    </tr>
                                    <tr>
                                        <td>Pas Foto</td>
                                        <td>
                                            <input
                                                type="file"
                                                class="form-control"
                                                name="pas_foto_cs"
                                                id="pas_foto_cs"
                                            />
                                            <div class="invalid-feedback" style="text-align: :left">
                                                Pass Foto Wajib Di Upload
                                            </div>
                                        </td>                                        
                                    </tr>        
                                    <tr>
                                        <td colspan="2">
                                            <button class="btn btn-primary w-100" type="submit" onclick="createPost()">
                                                <i class="fas fa-save"></i> Simpan & Selanjutnya
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>                                
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer"></div>
                <!-- /.card-footer-->
            </div>
          @else       
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">
                        <strong>Biodata Pendaftaran</strong>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        {{-- Resume --}}
                        <div class="col-md-12 mt-3">
                            <h5>5. Resume Pendaftaran</h5>
                            <p>
                                Silahkan mendownload kartu pendaftaran untuk daftar ulang setelah dinyatakan <strong>Lulus</strong>.
                            </p>
                            </div>
                            @forelse ($dataUser as $user)
                                <div class="col-md-2">
                                    <img
                                        class="img-thumbnail img-resume"
                                        src="{{ $user->foto }}"
                                        alt="pas-foto"
                                    />
                                </div>
                                <div class="col-md-10">
                                    <table class="table">                                                     
                                        <tr>
                                            @foreach ($status as $s)
                                                @if ($s->status_kelulusan == 0)
                                                    <td colspan="6" class="text-center bg-info">   
                                                        <h3>
                                                            <strong>
                                                                <div class="spinner-border text-light" role="status">
                                                                    <span class="sr-only">Loading...</span>
                                                                </div>                                     
                                                                MENUNGGU KONFIRMASI KELULUSAN       
                                                            </strong>
                                                        </h3>                                                                    
                                                    </td>  
                                                @elseif($s->status_kelulusan == 1)
                                                    <td colspan="6" class="text-center bg-success">   
                                                    <h3>
                                                        <strong>                                                                                   
                                                            SELAMAT ANDA LULUS MASUK 
                                                            <br>
                                                            Raudhatul Athfal Al-Mushanifiyah Jakarta Timur                                               
                                                        </strong>
                                                    </h3>                                  
                                                    <p>
                                                        Silahkan daftar ulang sesuai dengan tanggal di pengumuman, 
                                                        <br>                                           
                                                    </p>    
                                                    <p>
                                                        serta membawa berkas kartu pendaftaran, fotocopy akte kelahiran,
                                                        kartu keluarga dan cetak pas foto 4x6 3 foto
                                                    </p>                              
                                                </td>
                                                @else
                                                    <td colspan="6" class="text-center bg-danger">   
                                                        <h3>
                                                            <strong>                                                                                   
                                                                MAAF ANDA BELUM LULUS MASUK Raudhatul Athfal Al-Mushanifiyah Jakarta Timur
                                                            </strong>
                                                        </h3>                                                                    
                                                    </td>
                                                @endif
                                            @endforeach                                                                          
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>
                                                    <strong>
                                                        No Pendaftaran
                                                    </strong>
                                                </h5>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <h5>
                                                    <strong>{{ $user->no_pendaftaran }}</strong>
                                                </h5>
                                            </td>                               
                                        </tr>
                                        <tr>
                                            <td>NIK</td>
                                            <td>:</td>
                                            <td>{{ $user->relasiUser->nik }}</td>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td>{{ $user->relasiUser->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Lahir</td>
                                            <td>:</td>
                                            <td>{{ date('d M Y', strtotime($user->tgl_lahir_siswa)) }}</td>
                                            <td>Tempat Lahir Siswa</td>
                                            <td>:</td>
                                            <td>{{ $user->tmpt_lahir_siswa }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <p class="text-danger">
                                                    <strong>
                                                        *Print Menggunakan Browser Google Chrome
                                                    </strong>
                                                </p>
                                                <a href="{{ route('print') }}" target="_BLANK" class="btn btn-primary btn-lg">
                                                    CETAK KARTU PENDAFTARAN
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            @empty
                                
                            @endforelse 
                    </div>
                </div>
            </div>                                                          
          @endif          
          <!-- /.card -->
        </section>
        <!-- /.content -->
@endsection
@push('beforeScript')    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>        
    <script>
        function createPost(){
            Swal.fire({
                title : 'Apakah Kamu Yakin Untuk Disimpan ?',
                text: 'Data yang sudah disimpan tidak dapat diubah lagi',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya, Yakin'
            }).then((result) => {
                if(result.isConfirmed){
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/user/postpendaftaran') }}",
                        data: new FormData($("#cardbio form")[0]),
                        contentType:false,
                        processData:false,
                        success:function(data){             
                            Swal.fire({
                                position: 'center',
                                icon: 'success',                                
                                title: 'Berhasil Disimpan',
                                showConfirmButton: false,
                                timer: 3000,                        
                            });
                            // window.location.reload();
                            window.location.href = "{{ route('bio-user') }}";
                        },
                        error:function(){
                            Swal.fire({
                                position: 'center',
                                icon: 'error',                                
                                title: 'Data gagal disimpan, harap isi data yang kosong',
                                showConfirmButton: false,
                                timer: 3000,                        
                            });
                        }                
                    });                    
                }
            })            
        }                

        (function(){
            'use strict';
            window.addEventListener('load', function(){
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form){
                    form.addEventListener('submit', function(event){
                        if(form.checkValidity() === false){
                            event.preventDefault();
                            event.stopPropagation();
                        } form.classList.add('was-validated');
                        if(form.checkValidity() === true){                                                        
                            createPost();
                            event.preventDefault();  
                        }
                    }, false);
                });
            },false);
        })();
    </script>   
@endpush