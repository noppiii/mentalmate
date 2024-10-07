
<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Login | {{ config('app.name') }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    @include('layouts.asset.admin.style')
 <style>
        .swal2-container {
            z-index: 9999;
        }
        </style>
        @stack('style')
        <!-- SweetAlert 2 CSS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
        @stack('scripts')
    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/pages/page-auth.css') }}" />
    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="authentication-wrapper authentication-cover authentication-bg">
      <div class="authentication-inner row">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 p-0">
          <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
            <img
              src="{{ asset('image/login.png') }}"
              alt="auth-login-cover"
              class="img-fluid my-5 auth-illustration"
              data-app-light-img="illustrations/auth-login-illustration-light.png"
              data-app-dark-img="illustrations/auth-login-illustration-dark.png"
            />

            <img
              src="{{ asset('admin/assets/img/illustrations/bg-shape-image-light.png') }}"
              alt="auth-login-cover"
              class="platform-bg"
              data-app-light-img="illustrations/bg-shape-image-light.png"
              data-app-dark-img="illustrations/bg-shape-image-dark.png"
            />
          </div>
        </div>
        <!-- /Left Text -->

        <!-- Login -->
        <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
          <div class="w-px-400 mx-auto">
            <!-- Logo -->
            <div class="app-brand mb-4">
            </div>
            <!-- /Logo -->
              <h3 class="mb-1 fw-bold">Welcome to {{$siteIdentity->name_website}} 👋</h3>
              <p class="mb-4">Kami senang melihat Anda kembali! Masuk ke akun Anda dan mulailah langkah baru.</p>

              <form id="formAuthentication" class="mb-3" action="{{ route('postSignin') }}" method="POST">
                @csrf
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Enter your email"
                  autofocus
                />
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
{{--                  <a href="auth-forgot-password-cover.html">--}}
{{--                    <small>Forgot Password?</small>--}}
{{--                  </a>--}}
                </div>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password"
                  />
                  <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                </div>
              </div>
              <button class="btn btn-primary d-grid w-100">Sign in</button>
            </form>

            <p class="text-center">
              <span data-bs-toggle="modal" data-bs-target="#pricingModal">Baru di platform kami?</span>
            <span class="text-primary cursor-pointer" data-bs-toggle="modal" data-bs-target="#pricingModal">
              Buat Akun
            </span>
            </p>
          </div>
        </div>
        <!-- /Login -->
      </div>
    </div>

    {{-- =============== modal ======================== --}}
     <div class="modal fade" id="pricingModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-simple modal-pricing">
                  <div class="modal-content p-2 p-md-5">
                    <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <!-- Pricing Plans -->
                      <div class="pb-sm-5 pb-2 rounded-top">
                        <h2 class="text-center mb-2">Pilih Akses</h2>
                        <p class="text-center">

                        </p>
                        <div class="row mx-0 gy-3">

                          <!-- Pro -->
                          <div class="col-xl mb-md-0 mb-4">
                            <div class="card border-primary border shadow-none">
                              <div class="card-body position-relative">
                                <div class="position-absolute end-0 me-4 top-0 mt-4">
                                </div>
                                <div class="my-3 pt-2 text-center">
                                  <img
                                    src="{{ asset('image/mahasiswa-avatar.jpg') }}"
                                    alt="Standard Image"
                                    height="140"
                                  />
                                </div>
                                  <h3 class="card-title fw-semibold text-center text-capitalize mb-1">Mahasiswa</h3>
                                  <p class="text-center">Daftarkan diri Anda sebagai mahasiswa untuk mendapatkan layanan konsultasi dan tes psikologi.</p>
                                  <ul class="ps-3 my-2 pt-2">
                                      <li class="mb-2">Konsultasi dengan Psikolog</li>
                                      <li class="mb-2">Tes Kesehatan Mental</li>
                                      <li class="mb-2">Akses ke Berbagai Artikel dan Sumber Daya Psikologi</li>
                                      <li class="mb-0">Jadwal Fleksibel dan Mudah</li>
                                  </ul>
                                  <a href="{{ route('mahasiswa.signup') }}" class="btn btn-primary d-grid w-100 mt-3">Signup</a>
                              </div>
                            </div>
                          </div>

                          <!-- Enterprise -->
                          <div class="col-xl">
                            <div class="card border rounded shadow-none">
                              <div class="card-body">
                                <div class="my-3 pt-2 text-center">
                                  <img
                                    src="{{ asset('image/doctor-avatar.jpg') }}"
                                    alt="Enterprise Image"
                                    height="140"
                                  />
                                </div>
                                  <h3 class="card-title text-center text-capitalize fw-semibold mb-1">Psikolog</h3>
                                  <p class="text-center">Bergabunglah dengan MentalMate dan mulai membantu banyak orang melalui layanan konsultasi profesional.</p>
                                  <ul class="ps-3 my-2 pt-2">
                                      <li class="mb-2">Konsultasi secara online dengan fleksibilitas penuh</li>
                                      <li class="mb-2">Terhubung dengan ribuan klien yang membutuhkan dukungan mental</li>
                                      <li class="mb-2">Akses ke alat dan sumber daya psikologi terkini</li>
                                      <li class="mb-2">Jadwal konsultasi yang mudah diatur</li>
                                  </ul>
                                  <a href="{{ route('psikolog.signup') }}" class="btn btn-primary d-grid w-100 mt-3"
                                  >Signup</a
                                >
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--/ Pricing Plans -->
                    </div>
                  </div>
                </div>
              </div>

    <!-- / Content -->
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });

            Toast.fire({
                icon: 'error',
                title: 'Error!',
                html: '{{ $error }}'
            });
        </script>
    @endforeach
@endif

@if (Session::has('error_message'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "{{ Session::get('error_message') }}",
        showConfirmButton: false,
        timer: 3000 // milliseconds
    });
</script>
@endif
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    @include('layouts.asset.admin.script')

    <!-- Page JS -->
    <script src="{{ asset('admin/assets/js/pages-auth.js') }}"></script>
  </body>
</html>
