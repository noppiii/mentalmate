@extends('layouts.admin.main')
@section('title')
    Profile || {{ config('app.name') }}
@endsection
@section('pages')
    Profile Berkas Mahasiswa
@endsection
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <!-- Header -->
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="user-profile-header-banner">
                            {{-- <img src="{{ asset('admin/assets/img/pages/profile-banner.png') }}" alt="Banner image" class="rounded-top" /> --}}
                        </div>
                        <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                            <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                                <img
                                        src="{{ asset('store/user/photo/mahasiswa/' . $mahasiswaBerkas->profile_photo_path) }}"
                                        alt="user image"
                                        style="object-fit: contain; width: 100px; height: 100px;"
                                        class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img"
                                />
                            </div>
                            <div class="flex-grow-1 mt-3 mt-sm-5">
                                <div
                                        class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4"
                                >
                                    <div class="user-profile-info">
                                        <h4>{{ $mahasiswaBerkas->nama }}</h4>
                                        <ul
                                                class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2"
                                        >
                                            <li class="list-inline-item"><i
                                                        class="ti ti-number"></i> {{ $mahasiswaBerkas->nomor_induk_mahasiswa }}
                                            </li>
                                            <li class="list-inline-item">
                                                <i class="ti ti-building"></i>
                                                {{ $mahasiswaBerkas->nama_universitas }}
                                            </li>

                                            <li class="list-inline-item">
                                                <i class="ti ti-building-community"></i>
                                                {{ $mahasiswaBerkas->program_studi }}
                                            </li>
                                        </ul>
                                    </div>
                                    {{-- <a href="javascript:void(0)" class="btn btn-primary">
                                      <i class="ti ti-edit me-1"></i>Update
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Header -->

            <!-- Navbar pills -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);"
                            ><i class="ti-xs ti ti-user-check me-1"></i> Profile</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="pages-profile-teams.html"
                            ><i class="ti-xs ti ti-file me-1"></i> Berkas</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
            <!--/ Navbar pills -->

            <!-- User Profile Content -->
            <!-- Basic with Icons -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                    </div>
                    <div class="card-body">
                        <form action="{{ route('mahasiswa.profile.updateBerkas', $mahasiswaBerkas->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">KTM</label>
                                <div class="col-sm-10">
                                    <a href="{{ asset('storage/mahasiswa/profile/berkas/ktm/' . basename($mahasiswaBerkas->dokumen_ktm)) }}" target="_blank" class="btn rounded-pill btn-outline-vimeo mb-3">
                                        <i class="tf-icons ti ti-file ti-xs me-1"></i> KTM
                                    </a>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                    class="ti ti-file"></i></span>
                                        <input type="file" class="form-control" id="basic-icon-default-fullname"
                                               placeholder="Masukan nama" aria-label="Masukan nama"
                                               aria-describedby="basic-icon-default-fullname2" name="dokumen_ktm"/>
                                    </div>
                                    <div class="form-text">Upload ulang jika ingin mengunah KTM</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Transkip
                                    Nilai</label>
                                <div class="col-sm-10">
                                    <a href="{{ asset('storage/mahasiswa/profile/berkas/transkip/' . basename($mahasiswaBerkas->dokumen_transkip_nilai)) }}" target="_blank" class="btn rounded-pill btn-outline-youtube mb-3">
                                        <i class="tf-icons ti ti-file ti-xs me-1"></i> Transkip
                                    </a>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="ti ti-file"></i></span>
                                        <input type="file" class="form-control" id="basic-icon-default-fullname"
                                               placeholder="Masukan nama" aria-label="Masukan nama"
                                               aria-describedby="basic-icon-default-fullname2"
                                               name="dokumen_transkip_nilai"/>
                                    </div>
                                    <div class="form-text">Upload ulang jika ingin mengunah Transkip Nilai</div>
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/ User Profile Content -->
    </div>
    <!-- / Content -->
@endsection
