@extends('layouts.admin.main')
@section('title')
    Profile | {{ config('app.name') }}
@endsection
@section('pages')
    Profile
@endsection
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User Profile /</span> Profile</h4>

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
                                    src="{{ asset('store/user/photo/psikolog/' . $psikologProfile->profile_photo_path) }}"
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
                                        <h4>{{ $psikologProfile->nama }}</h4>
                                        <ul
                                            class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2"
                                        >
                                            <li class="list-inline-item"><i
                                                    class="ti ti-building"></i> {{ $psikologProfile->asal_universitas }}
                                            </li>
                                            <li class="list-inline-item">
                                                <i class="ti ti-category"></i>
                                                @foreach($psikologProfile->detailPsikologs->first()->bidangPsikologs as $bidang)
                                                    {{ $bidang->name }}{{ !$loop->last ? ',' : '' }}
                                                @endforeach
                                            </li>

                                            <li class="list-inline-item">
                                                <i class="ti ti-category-2"></i>
                                                @foreach($psikologProfile->detailPsikologs->first()->metodeKonsultasis as $metode)
                                                    {{ $metode->jenis_metode_konsultasi }}{{ !$loop->last ? ',' : '' }}
                                                @endforeach
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
                            <a class="nav-link active" href="javascript:void(0);"
                            ><i class="ti-xs ti ti-user-check me-1"></i> Profile</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('psikolog.profile.berkas')}}"
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
                        <form action="{{ route('psikolog.updateProfile', $psikologProfile->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="ti ti-user"></i></span>
                                        <input type="text" class="form-control" id="basic-icon-default-fullname"
                                               placeholder="Masukan nama" aria-label="Masukan nama"
                                               aria-describedby="basic-icon-default-fullname2"
                                               value="{{ $psikologProfile->nama }}" name="nama"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Foto</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="ti ti-photo"></i></span>
                                        <input type="file" class="form-control" id="basic-icon-default-fullname"
                                               placeholder="Masukan nama" aria-label="Masukan nama"
                                               aria-describedby="basic-icon-default-fullname2"
                                               name="profile_photo_path"/>
                                    </div>
                                    <div class="form-text">Upload gambar jika ingin mengganti foto</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="ti ti-mail"></i></span>
                                        <input type="email" id="basic-icon-default-email" class="form-control"
                                               placeholder="Masukan Email" aria-label="Masukan Email"
                                               aria-describedby="basic-icon-default-email2"
                                               value="{{ $psikologProfile->email }}" name="email"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"
                                       for="basic-icon-default-password">Password</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="ti ti-key"></i></span>
                                        <input type="password" id="basic-icon-default-password" class="form-control"
                                               placeholder="******" aria-label="******"
                                               aria-describedby="basic-icon-default-password2" name="password"/>
                                    </div>
                                    <div class="form-text">Tulis ulang jika ingin mengganti password</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-gender">Jenis
                                    Kelamin</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <select class="selectpicker w-100 show-tick" id="selectpickerIcons"
                                                data-icon-base="ti" data-tick-icon="ti-check" data-style="btn-default"
                                                name="jenis_kelamin">
                                            <option data-icon="ti ti-gender-male"
                                                    value="Laki-Laki" {{ $psikologProfile->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>
                                                Laki-Laki
                                            </option>
                                            <option data-icon="ti ti-gender-female"
                                                    value="Perempuan" {{ $psikologProfile->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                                Perempuan
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="flatpickr-date">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="ti ti-calendar"></i></span>
                                        <input type="text" name="tanggal_lahir"
                                               value="{{ $psikologProfile->tanggal_lahir }}" class="form-control"
                                               placeholder="YYYY-MM-DD" id="flatpickr-date"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-tempat_lahir">Tempat
                                    Lahir</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-tempat_lahir2" class="input-group-text"><i
                                                class="ti ti-map-pin"></i></span>
                                        <input type="text" id="basic-icon-default-tempat_lahir" class="form-control"
                                               placeholder="Masukan tempat lahir" aria-label="Masukan tempat lahir"
                                               aria-describedby="basic-icon-default-tempat_lahir2"
                                               value="{{ $psikologProfile->tempat_lahir }}" name="tempat_lahir"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 form-label"
                                       for="basic-icon-default-universitas">Universitas</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-universitas2" class="input-group-text"><i
                                                class="ti ti-building-arch"></i></span>
                                        <input type="text" id="basic-icon-default-universitas" class="form-control"
                                               placeholder="Masukan universitas" aria-label="Masukan universitas"
                                               aria-describedby="basic-icon-default-universitas2"
                                               value="{{ $psikologProfile->asal_universitas }}"
                                               name="asal_universitas"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-prodi">Program Studi</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-prodi2" class="input-group-text"><i
                                                class="ti ti-building"></i></span>
                                        <input type="text" id="basic-icon-default-prodi" class="form-control"
                                               placeholder="Masukan program studi" aria-label="Masukan program studi"
                                               aria-describedby="basic-icon-default-prodi2"
                                               value="{{ $psikologProfile->program_studi }}" name="program_studi"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-tahun_lulus">Tahun
                                    Lulus</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-tahun_lulus2" class="input-group-text"><i
                                                class="ti ti-calendar-stats"></i></span>
                                        <input type="text" id="basic-icon-default-tahun_lulus" class="form-control"
                                               placeholder="Masukan tahun lulus" aria-label="Masukan tahun lulus"
                                               aria-describedby="basic-icon-default-tahun_lulus2"
                                               value="{{ $psikologProfile->tahun_lulus }}" name="tahun_lulus"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-tempat_praktik">Tempat
                                    Praktik</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-tempat_praktik2" class="input-group-text"><i
                                                class="ti ti-building-community"></i></span>
                                        <input type="text" id="basic-icon-default-tempat_praktik" class="form-control"
                                               placeholder="Masukan tempat praktik" aria-label="Masukan tempat praktik"
                                               aria-describedby="basic-icon-default-tempat_praktik2"
                                               value="{{ $psikologProfile->tempat_praktik }}" name="tempat_praktik"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-deskripsi">Deskripsi</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-deskripsi2" class="input-group-text"><i
                                                class="ti ti-menu"></i></span>
                                        <textarea id="basic-icon-default-deskripsi" class="form-control"
                                                  placeholder="Masukan deskripsi" aria-label="Masukan deskripsi"
                                                  aria-describedby="basic-icon-default-deskripsi2"
                                                  name="deskripsi">{{ $psikologProfile->deskripsi }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="select2Primary">Bidang</label>
                                <div class="col-sm-10">
                                    <div class="select2-primary">
                                        <select id="select2Primary" class="select2 form-select" multiple
                                                name="bidang[]">
                                            @foreach($psikologProfile->detailPsikologs as $detail)
                                                @foreach($detail->bidangPsikologs as $bidang)
                                                    <option value="{{ $bidang->id }}"
                                                            selected>{{ $bidang->name }}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Metode
                                    Konsultasi</label>
                                <div class="col-sm-10">
                                    <div class="select2-success">
                                        <select id="select2Success" class="select2 form-select" multiple
                                                name="metode_konsultasi[]">
                                            @foreach($psikologProfile->detailPsikologs as $detail)
                                                @foreach($detail->metodeKonsultasis as $metode)
                                                    <option value="{{ $metode->id }}"
                                                            selected>{{ $metode->jenis_metode_konsultasi }}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
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
