@extends('layouts/admin',[
  'tahunAjaran' => $tahun
])

@section('content')
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title text-center">
                <strong>Diagram Statistik</strong>
              </h3>
            </div>
            <div class="card-body">
              <div class="row">
                @foreach ($dataStatistik as $item)
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                      <span class="info-box-icon bg-info elevation-1">
                        <i class="fas fa-user"></i>
                      </span>
                      <div class="info-box-content">
                        <span class="info-box-text">Jumlah Pendaftar</span>
                        <span class="info-box-number">{{ $item['pendaftar'] }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                      <span class="info-box-icon bg-primary elevation-1">
                        <i class="fas fa-user-check"></i>
                      </span>
                      <div class="info-box-content">
                        <span class="info-box-text">Jumlah Sukses</span>
                        <span class="info-box-number">{{ $item['sukses'] }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                      <span class="info-box-icon bg-success elevation-1">
                        <i class="fas fa-vote-yea"></i>
                      </span>
                      <div class="info-box-content">
                        <span class="info-box-text">Jumlah Lulus</span>
                        <span class="info-box-number">{{ $item['lulus'] }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                      <span class="info-box-icon bg-danger elevation-1">
                        <i class="fas fa-user-alt-slash"></i>
                      </span>
                      <div class="info-box-content">
                        <span class="info-box-text">Jumlah Tidak Lulus</span>
                        <span class="info-box-number">{{ $item['tidaklulus'] }}</span>
                      </div>
                    </div>
                  </div>
                @endforeach
               
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer"></div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
        </section>
        <!-- /.content -->
@endsection