<!DOCTYPE html>

<html
    lang="en"
    class="light-style customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="assets/"
    data-template="vertical-menu-template"
>
<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Mahasiswa Register | {{ config('app.name') }}</title>

    <meta name="description" content=""/>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    @include('layouts.asset.admin.style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/pages/page-auth.css') }}"/>
    <!-- Helpers -->
    <script src="{{ asset('admin/assets/vendor/js/helpers.js') }}"></script>
    <style>
        .swal2-container {
            z-index: 9999;
        }
    </style>
    <!-- SweetAlert 2 CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    {{-- <script src="{{ asset('admin/assets/vendor/js/template-customizer.js') }}"></script> --}}
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('admin/assets/js/config.js') }}"></script>
</head>

<body>
<!-- Content -->

<div class="authentication-wrapper authentication-cover authentication-bg">
    <div class="authentication-inner row">
        <!-- Left Text -->
        <div
            class="d-none d-lg-flex col-lg-4 align-items-center justify-content-center p-5 auth-cover-bg-color position-relative auth-multisteps-bg-height"
        >
            <img
                src="{{ asset('image/register-mahasiswa.png') }}"
                alt="auth-register-multisteps"
                class="img-fluid"
                width="280px"
            />

            <img
                src="{{ asset('admin/assets/img/illustrations/bg-shape-image-light.png') }}"
                alt="auth-register-multisteps"
                class="platform-bg"
                data-app-light-img="illustrations/bg-shape-image-light.png"
                data-app-dark-img="illustrations/bg-shape-image-dark.png"
            />
        </div>
        <!-- /Left Text -->

        <!--  Multi Steps Registration -->
        <div class="d-flex col-lg-8 align-items-center justify-content-center p-sm-5 p-3">
            <div class="w-px-700">
                <div id="multiStepsValidation" class="bs-stepper shadow-none">
                    <div class="bs-stepper-header border-bottom-0">
                        <div class="step" data-target="#accountDetailsValidation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle"><i class="ti ti-smart-home ti-sm"></i></span>
                                <span class="bs-stepper-label">
                      <span class="bs-stepper-title">Akun</span>
                      <span class="bs-stepper-subtitle">Informasi Akun</span>
                    </span>
                            </button>
                        </div>
                        <div class="line">
                            <i class="ti ti-chevron-right"></i>
                        </div>
                        <div class="step" data-target="#personalInfoValidation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle"><i class="ti ti-users ti-sm"></i></span>
                                <span class="bs-stepper-label">
                      <span class="bs-stepper-title">Profile</span>
                      <span class="bs-stepper-subtitle">Informasi Pribadi</span>
                    </span>
                            </button>
                        </div>
                        <div class="line">
                            <i class="ti ti-chevron-right"></i>
                        </div>
                        <div class="step" data-target="#billingLinksValidation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle"><i class="ti ti-file-text ti-sm"></i></span>
                                <span class="bs-stepper-label">
                      <span class="bs-stepper-title">Berkas</span>
                      <span class="bs-stepper-subtitle">Berkas Persyaratan</span>
                    </span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <form id="multiStepsForm" action="{{ route('mahasiswa.postSignup') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <!-- Account Details -->
                            <div id="accountDetailsValidation" class="content">
                                <div class="row g-3">
                                    <div class="col-sm-12">
                                        <label class="form-label" for="multiStepsEmail">Email</label>
                                        <input
                                            type="email"
                                            name="email"
                                            id="multiStepsEmail"
                                            class="form-control"
                                            placeholder="xxxxxxxx@gmail.com"
                                            required
                                        />
                                    </div>
                                    <div class="col-sm-12 form-password-toggle">
                                        <label class="form-label" for="multiStepsPass">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input
                                                type="password"
                                                id="multiStepsPass"
                                                name="password"
                                                class="form-control"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="multiStepsPass2"
                                                required
                                            />
                                            <span class="input-group-text cursor-pointer" id="multiStepsPass2"><i
                                                    class="ti ti-eye-off"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-between mt-4">
                                        <button class="btn btn-label-secondary btn-prev" disabled>
                                            <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span>
                                            <i class="ti ti-arrow-right ti-xs"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Personal Info -->
                            <div id="personalInfoValidation" class="content">
                                <div class="row g-3">
                                    <div class="col-sm-12">
                                        <label class="form-label" for="multiStepsFirstName">Nama Lengkap</label>
                                        <input
                                            type="text"
                                            id="multiStepsFirstName"
                                            name="nama"
                                            class="form-control"
                                            placeholder="Masukan nama lengkap"
                                            required
                                        />
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="form-label" for="multiStepsNIM">Nomor Induk Mahasiswa</label>
                                        <input
                                            type="text"
                                            id="multiStepsNIM"
                                            name="nomor_induk_mahasiswa"
                                            class="form-control"
                                            placeholder="Masukan nomor induk mahasiswa"
                                            required
                                        />
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="multiStepsGender">Jenis Kelamin</label>
                                        <select id="multiStepsGender" name="jenis_kelamin"
                                                class="select2JenisKelamin form-select" data-allow-clear="true"
                                                required>
                                            <option value="">Select</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="flatpickr-date" class="form-label">Tanggal Lahir</label>
                                        <input type="text" class="form-control" name="tanggal_lahir"
                                               placeholder="YYYY-MM-DD" id="flatpickr-date" required/>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" for="multiStepsTempatLahir">Tempat Lahir</label>
                                        <input
                                            type="text"
                                            id="multiStepsTempatLahir"
                                            name="tempat_lahir"
                                            class="form-control"
                                            placeholder="Masukan tempat lahir"
                                            required
                                        />
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" for="multiStepsUniversitas">Universitas</label>
                                        <select id="multiStepsUniversitas" name="asal_universitas"
                                                class="select2Universitas form-select" data-allow-clear="true" required>
                                            <option value="">Select</option>
                                            @foreach($universitas as $uni)
                                                <option value="{{ $uni['nama_pt'] }}">{{ $uni['nama_pt'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="multiStepsFakultas">Fakultas</label>
                                        <select id="multiStepsFakultas" name="fakultas"
                                                class="select2Fakultas form-select" data-allow-clear="true" required>
                                            <option value="">Select</option>
                                            <option value="Fakultas Ekonomi dan Bisnis">Fakultas Ekonomi dan Bisnis</option>
                                            <option value="Fakultas Teknik">Fakultas Teknik</option>
                                            <option value="Fakultas Hukum">Fakultas Hukum</option>
                                            <option value="Fakultas Kedokteran">Fakultas Kedokteran</option>
                                            <option value="Fakultas Ilmu Komputer">Fakultas Ilmu Komputer</option>
                                            <option value="Fakultas Pertanian">Fakultas Pertanian</option>
                                            <option value="Fakultas Ilmu Budaya (Sastra)">Fakultas Ilmu Budaya (Sastra)</option>
                                            <option value="Fakultas Matematika dan Ilmu Pengetahuan Alam (MIPA)">Fakultas Matematika dan Ilmu Pengetahuan Alam (MIPA)</option>
                                            <option value="Fakultas Ilmu Sosial dan Ilmu Politik (FISIP)">Fakultas Ilmu Sosial dan Ilmu Politik (FISIP)</option>
                                            <option value="Fakultas Arsitektur">Fakultas Arsitektur</option>
                                            <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                                            <option value="Fakultas Farmasi">Fakultas Farmasi</option>
                                            <option value="Fakultas Kedokteran Gigi">Fakultas Kedokteran Gigi</option>
                                            <option value="Fakultas Ilmu Keperawatan">Fakultas Ilmu Keperawatan</option>
                                            <option value="Fakultas Perikanan dan Ilmu Kelautan">Fakultas Perikanan dan Ilmu Kelautan</option>
                                            <option value="Fakultas Peternakan">Fakultas Peternakan</option>
                                            <option value="Fakultas Kesehatan Masyarakat">Fakultas Kesehatan Masyarakat</option>
                                            <option value="Fakultas Ilmu Administrasi">Fakultas Ilmu Administrasi</option>
                                            <option value="Fakultas Agama Islam">Fakultas Agama Islam</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="multiStepsProgramStudi">Program Studi</label>
                                        <input type="text" id="multiStepsTahunMasuk" name="program_studi"
                                               class="form-control" placeholder="Masukan program studi" required/>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="multiStepsTahunMasuk">Tahun Masuk</label>
                                        <input type="text" id="multiStepsTahunMasuk" name="tahun_masuk"
                                               class="form-control" placeholder="Masukan tahun masuk" required/>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="multiStepsSemester">Semester</label>
                                        <input type="text" id="multiStepsSemester" name="semester" class="form-control"
                                               placeholder="Masukan semester" required/>
                                    </div>
                                    <div class="col-12 d-flex justify-content-between mt-4">
                                        <button class="btn btn-label-secondary btn-prev">
                                            <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span>
                                            <i class="ti ti-arrow-right ti-xs"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Billing Links -->
                            <div id="billingLinksValidation" class="content">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="form-label w-100" for="multiStepsKTM">KTM</label>
                                        <div class="input-group">
                                            <input type="file" name="dokumen_ktm" class="form-control"
                                                   id="multiStepsKTM" required/>
                                            <label class="input-group-text" for="multiStepsKTM">Upload</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label w-100" for="multiStepsTranskipNilai">Transkip
                                            Nilai</label>
                                        <div class="input-group">
                                            <input type="file" name="dokumen_transkip_nilai" class="form-control"
                                                   id="multiStepsTranskipNilai" required/>
                                            <label class="input-group-text" for="multiStepsTranskipNilai">Upload</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label w-100" for="multiStepsFoto">Foto</label>
                                        <div class="input-group">
                                            <input type="file" name="profile_photo_path" class="form-control"
                                                   id="multiStepsFoto"/>
                                            <label class="input-group-text" for="multiStepsFoto">Upload</label>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-between mt-4">
                                        <button class="btn btn-label-secondary btn-prev">
                                            <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button type="submit" class="btn btn-success btn-submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- / Multi Steps Registration -->
    </div>
</div>

<script>
    // Check selected custom option
    window.Helpers.initCustomOptionCheck();
</script>
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
<!-- / Content -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/node-waves/node-waves.js') }}"></script>

<script src="{{ asset('admin/assets/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/i18n/i18n.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>

<script src="{{ asset('admin/assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('admin/assets/vendor/libs/cleavejs/cleave.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/select2/select2.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>

<script src="{{ asset('admin/assets/vendor/libs/moment/moment.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/pickr/pickr.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('admin/assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('admin/assets/js/pages-auth-multisteps.js') }}"></script>
<script src="{{ asset('admin/assets/js/forms-pickers.js') }}"></script>
</body>
</html>
