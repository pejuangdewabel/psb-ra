
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Daftar Akun | Penerimaan Siswa Baru</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/fontawesome-free/css/all.css') }}" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dashboard/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    body{
      background-color: rgb(204, 215, 248) !important;
    }
  </style>
</head>
<body class="hold-transition register-page">
<div class="register-box">  
  <div class="register-logo">    
    <a href="#"><b>        
        <img src="{{ url('img/logo-ra.png') }}" style="max-width: 35% !important">
        <br>
        Sistem Penerimaan Siswa
    </a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <h6 class="login-box-msg">
        Silahkan untuk mendaftar akun
      </h6>     
      <form action="{{ route('daftar') }}" method="post">
        @csrf
        <div class="form-group">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>                    
          </div>
          @if ($errors->has('nik'))
            <span class="badge badge-danger">{{ $errors->first('nik') }}</span>
          @endif
        </div>                 
       
        <div class="form-group">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="namalengkap" id="namalengkap" placeholder="Nama Lengkap">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          @if ($errors->has('namalengkap'))
            <span class="badge badge-danger">{{ $errors->first('namalengkap') }}</span>
          @endif
        </div>
        <div class="form-group">
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @if ($errors->has('password'))
            <span class="badge badge-danger">{{ $errors->first('password') }}</span>
          @endif
        </div>
        <div class="form-group">
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Konfirmasi Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @if ($errors->has('confirmpassword'))
            <span class="badge badge-danger">{{ $errors->first('confirmpassword') }}</span>
          @endif
        </div>
        <div class="row">          
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Daftar Akun</button>
          </div>          
        </div>
      </form>

      <div class="social-auth-links text-center">        
        <a href="{{ route('login') }}" class="btn btn-block btn-success"> 
          <i class="fa fa-sign-in" aria-hidden="true"></i>         
          Kembali ke login
        </a>        
      </div>

      <a href="{{ route('landing-page') }}" class="text-center">Klik untuk ke home</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
@include('sweetalert::alert')
<!-- jQuery -->
<script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dashboard/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
