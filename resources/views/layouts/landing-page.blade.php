<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Penerimaaan Siswa Baru | Raudhatul Athfal Al-Mushanifiyah Jakarta Timur</title>
    <meta content="" name="description" />

    <meta content="" name="keywords" />

    <!-- Favicons -->    
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/gif" sizes="32x32">
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="{{ asset('landing-page/vendor/bootstrap/css/bootstrap.min.css') }}"
      rel="stylesheet"
    />
    <link
      href="{{ asset('landing-page/vendor/bootstrap-icons/bootstrap-icons.css') }}"
      rel="stylesheet"
    />
    <link href="{{ asset('landing-page/vendor/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('landing-page/vendor/remixicon/remixicon.css') }}" rel="stylesheet" />
    <link href="{{ asset('landing-page/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />
    <link
      href="{{ asset('landing-page/vendor/glightbox/css/glightbox.min.css') }}"
      rel="stylesheet"
    />

    <!-- Template Main CSS File -->
    <link href="{{ asset('landing-page/css/style.css') }}" rel="stylesheet" />
  </head>

  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
      <div
        class="
          container-fluid container-xl
          d-flex
          align-items-center
          justify-content-between
        "
      >
        <a href="index.html" class="logo d-flex align-items-center">
          <img src="{{ asset('img/logo-ra.png') }}" alt="" srcset="">
          {{-- <img src="{{ asset('landing-page/img/logo.png') }}" alt="" /> --}}
          <span>PSB Online</span>
        </a>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li>
              <a class="nav-link scrollto" href="#informasipendaftaran"
                >Tahapan Pendaftaran</a
              >
            </li>
            <li><a class="nav-link scrollto" href="#footer">Kontak</a></li>
            <li>
              <a href="{{ route('login') }}" class="nav-link scrollto">Login</a>
            </li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
      </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h1>
              Sistem Penerimaan Siswa Baru Berbasis Online Tahun Ajaran
              @foreach ($tahun as $t)
                  {{ $t->date1 . '/' . $t->date2 }}
              @endforeach
            </h1>
            <h2>
              <strong>
                Raudhatul Athfal Al-Mushanifiyah 
                <br>
                Jakarta Timur
              </strong>
            </h2>
            <div>
              <div class="text-center text-lg-start">
                <a
                  href="{{ route('registration') }}"
                  class="
                    btn-get-started
                    scrollto
                    d-inline-flex
                    align-items-center
                    justify-content-center
                    align-self-center
                  "
                >
                  <span>Pendaftaran</span>
                  <i class="bi bi-arrow-right-circle-fill"></i>
                </a>
                <a
                  href="{{ route('login') }}"
                  class="
                    btn-get-started
                    scrollto
                    d-inline-flex
                    align-items-center
                    justify-content-center
                    align-self-center
                  "
                  style="background-color: rgb(1, 114, 52)"
                >
                  <span>Login</span>
                  <i class="bi bi-box-arrow-in-right"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 hero-img">
            <img src="{{ asset('landing-page/img/hero-img.png') }}" class="img-fluid" alt="" />
          </div>
        </div>
      </div>
    </section>
    <!-- End Hero -->

    <main id="main">
      <!-- ======= Values Section ======= -->
      <section id="informasipendaftaran" class="values">
        <div class="container" data-aos="fade-up">
          <header class="section-header">
            <h2>Informasi Pendaftaran</h2>
            <p>
              Tahapan dan Periode Proses Pendaftaran Siswa Baru Tahun Ajaran
              @foreach ($tahun as $t)
                  {{ $t->date1 . '/' . $t->date2 }}
              @endforeach
            </p>
          </header>

          <div class="row">
            @foreach ($pengumuman as $p)
                <div class="col-lg-4">
                  <div class="box">
                    <img src="{{ asset('landing-page/img/values-1.png') }}" class="img-fluid" alt="" />
                    <h3>Tahap Pendaftaran</h3>
                    <p>
                      Calon siswa akan mendaftar akun terlebih dahulu agar
                      mendapatkan username dan password untuk login ke website.
                      Periode pembuatan akun dari tanggal
                      <br />
                      <strong class="bg-primary text-white px-2">
                        {{ date('d M Y', strtotime($p->pendaftaran_awal)) }} - {{ date('d M Y', strtotime($p->pendaftaran_akhir)) }}
                      </strong>
                      <br />                  
                    </p>
                  </div>
                </div>

                <div class="col-lg-4 mt-4 mt-lg-0">
                  <div class="box">
                    <img src="{{ asset('landing-page/img/values-2.png') }}" class="img-fluid" alt="" />
                    <h3>Tahap Pengumuman</h3>
                    <p>
                      Pengumuman akan diinformasikan melalui website ini, silahkan
                      login kembali untuk melihat status apakah diterima atau tidak.
                      Pengumuman dilaksanakan pada tanggal
                      <br />
                      <strong class="bg-primary text-white px-2">
                        {{ date('d M Y', strtotime($p->pengumuman)) }}
                      </strong>
                    </p>
                  </div>
                </div>

                <div class="col-lg-4 mt-4 mt-lg-0">
                  <div class="box">
                    <img src="{{ asset('landing-page/img/values-3.png') }}" class="img-fluid" alt="" />
                    <h3>Tahap Daftar Ulang</h3>
                    <p>
                      Setelah dinyatakan lulus maka siswa diwajibkan melakukan
                      daftar ulang ke sekolah dengan membawa berkas yang sudah
                      tertera dipengumuman kelulusan di akun masing-masing.
                      <br />
                      <strong class="bg-primary text-white px-2">
                        {{ date('d M Y', strtotime($p->daftar_ulang_awal)) }} - {{ date('d M Y', strtotime($p->daftar_ulang_akhir)) }}
                      </strong>
                    </p>
                  </div>
                </div>
            @endforeach            
          </div>
        </div>
      </section>
      <!-- End Values Section -->
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="container">
        <div class="copyright">
          &copy; Copyright
          <strong><span>PUSTIK SD Raudhatul Athfal Al-Mushanifiyah Jakarta Timur</span></strong>
        </div>
        <div class="credits">
          <a href="" class="btn btn-success btn-sm">
            <i class="bi bi-whatsapp"></i>
            Hubungi Panitia
          </a>
        </div>
      </div>
    </footer>
    <!-- End Footer -->

    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('landing-page/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('landing-page/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('landing-page/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('landing-page/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('landing-page/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('landing-page/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing-page/vendor/glightbox/js/glightbox.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset("landing-page/js/main.js") }}"></script>
  </body>
</html>
