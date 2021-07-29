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
    <div id="app">
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
          <a href="#" class="brand-link">
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
                <a href="#" class="d-block">
                  {{ Auth::guard('admin')->user()->nama }}
                </a>
                <span class="badge badge-primary"> Level : {{ Auth::guard('admin')->user()->level }} </span>
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
                  <a href="{{ route('index-admin') }}" class="nav-link {{ (request()->is('admin')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                  </a>
                </li>
                <li class="nav-item has-treeview {{ (request()->is('admin/data*')) ? 'menu-open' : '' }}">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-database"></i>
                    <p>
                      Data Utama
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ route('kelas-admin') }}" class="nav-link {{ (request()->is('admin/data/kelas')) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Kelas</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('tahun-admin') }}" class="nav-link {{ (request()->is('admin/data/tahun')) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Tahun Ajaran</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('informasi-admin') }}" class="nav-link {{ (request()->is('admin/data/informasi')) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Informasi</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('pendaftar-admin') }}" class="nav-link {{ (request()->is('admin/data/pendaftar')) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Pendaftar</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('kelulusan-admin') }}" class="nav-link {{ (request()->is('admin/data/kelulusan')) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Diterima</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <!-- menu-open -->
                <li class="nav-item has-treeview {{ (request()->is('admin/pengguna*')) ? 'menu-open' : '' }}">
                  <!-- active -->
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-database"></i>
                    <p>
                      Data Pengguna
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ route('user-admin') }}" class="nav-link {{ (request()->is('admin/pengguna/user')) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data User</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('admin-admin') }}" class="nav-link {{ (request()->is('admin/pengguna/admin')) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Admin</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a
                    href="{{ route('show-pass') }}"
                    class="nav-link"
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
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-12 text-center">
                  <h1>Dashboard Admin PSB Raudhatul Athfal Al-Mushanifiyah Jakarta Timur</h1>
                  <h5>
                    Tahun Ajaran 
                    @foreach ($tahunAjaran as $t)
                        {{ $t->date1 }} / {{ $t->date2 }}
                    @endforeach
                  </h5>
                </div>
              </div>
            </div>
          <!-- /.container-fluid -->
          </section>
          @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
          <div class="float-right d-none d-sm-block"><b>Version</b> 1.0.0</div>
          <strong> Copyright &copy; 2021 </strong>
          All rights reserved.
        </footer>       

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
      </div>
      <!-- ./wrapper -->
    </div>    

    <!-- jQuery -->
    @stack('afterScript')
    @include('sweetalert::alert')
    <script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dashboard/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dashboard/dist/js/demo.js') }}"></script>
    <script>
      $(document).ready(function () {
        $("#show_hide_passwordOld a").on("click", function (event) {
          event.preventDefault();
          if ($("#show_hide_passwordOld input").attr("type") == "text") {
            $("#show_hide_passwordOld input").attr("type", "password");
            $("#show_hide_passwordOld i").addClass("fa-eye-slash");
            $("#show_hide_passwordOld i").removeClass("fa-eye");
          } else if (
            $("#show_hide_passwordOld input").attr("type") == "password"
          ) {
            $("#show_hide_passwordOld input").attr("type", "text");
            $("#show_hide_passwordOld i").removeClass("fa-eye-slash");
            $("#show_hide_passwordOld i").addClass("fa-eye");
          }
        });
      });
    </script>  
    <script>
      $(document).ready(function () {
        $("#show_hide_passwordNew a").on("click", function (event) {
          event.preventDefault();
          if ($("#show_hide_passwordNew input").attr("type") == "text") {
            $("#show_hide_passwordNew input").attr("type", "password");
            $("#show_hide_passwordNew i").addClass("fa-eye-slash");
            $("#show_hide_passwordNew i").removeClass("fa-eye");
          } else if (
            $("#show_hide_passwordNew input").attr("type") == "password"
          ) {
            $("#show_hide_passwordNew input").attr("type", "text");
            $("#show_hide_passwordNew i").removeClass("fa-eye-slash");
            $("#show_hide_passwordNew i").addClass("fa-eye");
          }
        });
      });
    </script>
    <script>
      $(document).ready(function () {
        $("#show_hide_passwordKonfirmasi a").on("click", function (event) {
          event.preventDefault();
          if ($("#show_hide_passwordKonfirmasi input").attr("type") == "text") {
            $("#show_hide_passwordKonfirmasi input").attr("type", "password");
            $("#show_hide_passwordKonfirmasi i").addClass("fa-eye-slash");
            $("#show_hide_passwordKonfirmasi i").removeClass("fa-eye");
          } else if (
            $("#show_hide_passwordKonfirmasi input").attr("type") == "password"
          ) {
            $("#show_hide_passwordKonfirmasi input").attr("type", "text");
            $("#show_hide_passwordKonfirmasi i").removeClass("fa-eye-slash");
            $("#show_hide_passwordKonfirmasi i").addClass("fa-eye");
          }
        });
      });
    </script>  
    {{-- Vue JS --}}
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('beforeScript')
  </body>
</html>
