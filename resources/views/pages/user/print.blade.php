<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    @foreach ($dataUser as $data)
        <title>{{ 'Cetak-Kartu-Pendaftaran-'. $data->relasiUser->nik . '-'. $data->relasiUser->nama }}</title>
    @endforeach    
    <style>
        body{
                font-size: 12pt !important;
                width: 21cm;
                height: 29.7cm;
                margin-left: auto;
                margin-right: auto;
                color: #000 !important;
                font-family: Arial, Helvetica, sans-serif;
            }
        table tr td,
        table tr th{
            font-size: 12pt;
        }
       .table-bordered tr, .table-bordered td{            
            border-color: black !important;
        }        
    </style>
  </head>
                {{-- <div class="col-md-2">
                    <img class="img-thumbnail" src="{{ $d->foto }}" alt="">                                        
                    Untuk template di Blade Laravel
                    <div class="visible-print text-center mt-3">
                        {!! QrCode::size(100)->generate(Request::url()); !!}
                        <p>Scan Barcode</p>
                    </div>
                    Untuk di template download PDF
                  <img class="img-thumbnail img-resume mt-3" src="data:image/png;base64, {{ $qrcode }}">                   
                </div> --}}
  <body onload="window.print()">
    <div class="container mt-5">
        <table>            
            <tr>
                <td class="text-right">
                    <img src="{{ asset('img/logo-ra.png') }}" style="max-width: 50%;">
                </td>
                <td class="text-left">
                    <h3><strong>KARTU PENDAFTARAN PSB ONLINE</strong></h3>
                    <h4>Raudhatul Athfal Al-Mushanifiyah Jakarta Timur</h4>
                    @foreach ($tahun as $t)
                        <h4>Tahun Ajaran {{ $t->date1 . '/' . $t->date2 }}</h4>
                    @endforeach                    
                </td>                    
            </tr>                                 
        </table>        
    </div>    
    <hr>
    <div class="container mt-3">
        @foreach ($dataUser as $d)
            <div class="row">                       
                <div class="col-md-12">
                  <table class="table table-bordered">                    
                    <tr class="text-center">
                        <td colspan="6">
                            <img src="{{ asset('img/1.jpg') }}" style="max-width: 60%;">
                        </td>   
                    </tr>
                    <tr>
                      <td colspan="6" class="text-center">
                        <h4>
                            <strong>BIODATA</strong>
                        </h4>
                      </td>
                    </tr>
                    <tr>
                      <td>
                          <strong>NO PENDAFTARAN</strong>
                      </td>
                      <td>:</td>
                      <td>
                          <strong>{{ $d->no_pendaftaran }}</strong>
                      </td>
                      <td>
                          <strong>NIK</strong>
                      </td>
                      <td>:</td>
                      <td>
                          <strong>{{ $d->relasiUser->nik }}</strong>
                      </td>
                    </tr>
                    <tr>
                      <td>
                          <strong>NAMA LENGKAP</strong>
                      </td>
                      <td>:</td>
                      <td>
                          <strong>{{ $d->relasiUser->nama }}</strong>
                      </td>
                      <td>
                          <strong>TANGGAL LAHIR</strong>
                      </td>
                      <td>:</td>
                      <td>
                          <strong>{{ date('d M Y', strtotime($d->tgl_lahir_siswa)) }}</strong>
                      </td>
                    </tr>
                    <tr>
                      <td rowspan="4" colspan="3" class="text-center">
                        <div class="visible-print text-center mt-3">
                            {!! QrCode::size(100)->generate($d->foto); !!}
                            <p>Scan Barcode</p>
                        </div>                        
                      </td>                                            
                      <td colspan="3" rowspan="4" class="text-center">
                          <strong>
                              Tanggal Pendaftaran, {{ date('d M Y', strtotime($d->created_at)) }}
                              <br>
                              Tanda Tangan Panitia Penerimaan Siswa baru                              
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              .......................................................................
                          </strong>
                      </td>                      
                    </tr>
                    <tr>
                                           
                    </tr>
                    <tr>
                                           
                    </tr>
                    <tr>
                                       
                    </tr>
                  </table>
                </div>
            </div>
        @endforeach        
    </div>    
  </body>
</html>