<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pendaftaran Siswa Baru Berbasis Online</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />              

    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/gif" sizes="32x32">
    
    @stack('afterLink')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/fontawesome-free/css/all.css') }}" />
    <!-- Ionicons -->
    <link
      rel="stylesheet"
      href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('dashboard/dist/css/adminlte.min.css') }}" />
    <!-- Google Font: Source Sans Pro -->
    <link
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700"
      rel="stylesheet"
    />
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/dist/css/main.css') }}" />

    @stack('beforeLink')
  </head>
  <body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"
              ><i class="fas fa-bars"></i
            ></a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../../index3.html" class="brand-link">
          <img
            src="{{ asset('img/favicon.ico') }}"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: 0.8"
          />
          <span class="brand-text font-weight-light">PSB Online</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYGa1E-du8S9ynZowTBMsvf-XnXb1yLrwqzA&usqp=CAU"
                class="img-circle elevation-2"
                alt="User Image"
              />
            </div>
            <div class="info">
              <a href="#" class="d-block">{{ Auth::guard('user')->user()->nama }}</a>
              <span class="badge badge-primary"> Level : {{ Auth::guard('user')->user()->level }} </span>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul
              class="nav nav-pills nav-sidebar flex-column"
              data-widget="treeview"
              role="menu"
              data-accordion="false"
            >
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="{{ route('index-user') }}" class="nav-link {{ (request()->is('user')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Home</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('bio-user') }}" class="nav-link {{ (request()->is('user/pendaftaran/biodata')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>Pendaftaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a
                  href="{{ route('password-user') }}"                  
                  class="nav-link {{ (request()->is('user/changePassword')) ? 'active' : '' }}"                  
                >
                  <i class="fas fa-user-cog"></i>
                  <p>Ubah Password</p>
                </a>
              </li>
              <li class="nav-header"></li>
              <li class="nav-item">
                <a
                  href="{{ route('logout-login') }}"
                  class="nav-link btn btn-danger btn-sm btn-keluar"
                >
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>Keluar</p>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        @yield('content')
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="float-right d-none d-sm-block"><b>Version</b> 1.0.0</div>
        <strong> Copyright &copy; 2021 </strong>
        All rights reserved.
      </footer>

      <!-- Modal Foto-->
      <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title">Contoh Format Pas Foto</h6>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-center">
              <img
                class="img-thumbnail"
                src="https://i.pinimg.com/736x/ea/d3/80/ead380847cf54ead37e1f2a3c6aa1d84.jpg"
                alt="contoh-pas-foto"
              />
            </div>
            <div class="modal-footer justify-content-between">
              <button
                type="button"
                class="btn btn-info btn-sm"
                data-dismiss="modal"
              >
                Keluar
              </button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>            
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @stack('afterScript')
    @include('sweetalert::alert')
    <!-- jQuery -->
    <script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dashboard/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dashboard/dist/js/demo.js') }}"></script>
    <script>
      $(document).ready(function () {
        $("#show_hide_password a").on("click", function (event) {
          event.preventDefault();
          if ($("#show_hide_password input").attr("type") == "text") {
            $("#show_hide_password input").attr("type", "password");
            $("#show_hide_password i").addClass("fa-eye-slash");
            $("#show_hide_password i").removeClass("fa-eye");
          } else if (
            $("#show_hide_password input").attr("type") == "password"
          ) {
            $("#show_hide_password input").attr("type", "text");
            $("#show_hide_password i").removeClass("fa-eye-slash");
            $("#show_hide_password i").addClass("fa-eye");
          }
        });
      });
    </script>
    @stack('beforeScript')
  </body>
</html>
