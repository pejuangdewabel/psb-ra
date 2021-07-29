@extends('layouts.user')

@section('content')
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-12 text-center">
                <img src="{{ asset('img/logo-ra.png') }}" alt="" class="" style="max-width: 12% !important">
                <h1>
                  Penerimaan Siswa Baru Berbasis Online 
                  <br>
                  Raudhatul Athfal Al-Mushanifiyah Jakarta Timur
                  <br>
                  Tahun Ajaran
                  @foreach ($tahun as $t)
                        {{ $t->date1 }} / {{ $t->date2 }}
                  @endforeach
                </h1>                             
              </div>
              <!-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Blank Page</li>
                </ol>
              </div> -->
            </div>
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- Main content -->        
        <section class="content">
          <!-- Default box -->
          <div class="card">
            @if ($no == 1)
              <a href="{{ route('bio-user') }}" class="btn btn-primary">
                  CEK KELULUSAN
              </a>
            @endif                         
            <div class="card-header">
              <h3 class="card-title text-center text-danger">
                <strong>*Silahkan dibaca dengan cermat pengumuman ini</strong>
              </h3>             
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 text-center">
                  <h4>
                    <strong>PERIODE PENDAFTARAN</strong>
                  </h4>
                  @foreach ($pengumuman as $p)
                    <table class="table table-bordered table-hover">
                      <thead class="text-left">
                        <tr>
                          <th>Tanggal</th>
                          <th>Kegiatan</th>
                        </tr>
                      </thead>
                      <tbody class="text-left">
                        <tr>
                          <td>{{ date('d M Y', strtotime($p->pendaftaran_awal)) }} - {{ date('d M Y', strtotime($p->pendaftaran_akhir)) }}</td>
                          <td>Masa Pendaftaran Siswa Baru</td>
                        </tr>
                        <tr>
                          <td>{{ date('d M Y', strtotime($p->pengumuman)) }}</td>
                          <td>Pengumuman Hasil Seleksi Siswa Baru</td>
                        </tr>
                        <tr>
                          <td>{{ date('d M Y', strtotime($p->daftar_ulang_awal)) }} - {{ date('d M Y', strtotime($p->daftar_ulang_akhir)) }}</td>
                          <td>Daftar Ulang</td>
                        </tr>                                                
                      </tbody>
                    </table>
                  @endforeach                    
                </div>
                <div class="col-md-12 text-center mt-5">
                  <h4>
                    <strong>CARA PENDAFTARAN</strong>
                  </h4>
                  <table class="table table-bordered table-hover">
                    <thead class="text-left">
                      <tr>
                        <th>No</th>
                        <th>Tahapan</th>
                      </tr>
                    </thead>
                    <tbody class="text-left">
                      <tr>
                        <td>1</td>
                        <td>
                          Klik <strong>Menu Pendaftaran</strong> yang ada
                          disebelah kirim sidebar.
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>
                          Sebelum mengisi dan melengkapi biodata siswa
                          persiapkan terlebih dahulu dokumen yang diperlukan
                          seperti :
                          <ol>                            
                            <li>
                              Akta Kelahiran
                              <strong>(Wajib)</strong>
                            </li>
                            <li>
                              Kartu Keluarga
                              <strong>(Wajib)</strong>
                            </li>
                            <li>
                              Pas Foto Berlatar Belakang Merah. Berikut
                              contohnya
                              <a
                                href="#"
                                target="_blank"
                                class="badge badge-info"
                                data-toggle="modal"
                                data-target="#modal-sm"
                              >
                                Contoh Foto
                              </a>
                              <br />
                              <strong>(Wajib)</strong>
                            </li>
                          </ol>
                        </td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>
                          Silahkan untuk mengisi dan melengkapi data sesuai
                          dengan data diri masing-masing calon siswa dan upload
                          berkas yang diperlukan
                          <br />
                          Bila sudah selesai maka silahkan untuk klik
                          <strong>SIMPAN</strong>
                          <br />
                          Setelah calon siswa menekan tombol SIMPAN
                          maka data tidak akan bisa diubah kembali, maka harap
                          dicek kembali data yang dimasukkan.                                                    
                        </td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>
                          Setelah menekan tombol SIMPAN, maka calon
                          siswa akan dapat mendapatkan kartu pendaftaran yang
                          akan dipergunakan untuk daftar ulang bila dinyatakan
                          <strong>LULUS</strong>.
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <p>(Sumber Panitia PSB SD XYZ)</p>
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
        </section>
        <!-- /.content -->
@endsection