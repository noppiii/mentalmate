@extends('layouts.admin.main')
@section('title')
    Admin || Dashboard
@endsection
@section('pages')
    Dashboard
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
                          src="{{ asset('admin/assets/img/avatars/14.png') }}"
                          alt="user image"
                          class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img"
                        />
                      </div>
                      <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                          class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4"
                        >
                          <div class="user-profile-info">
                            <h4>John Doe</h4>
                            <ul
                              class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2"
                            >
                              <li class="list-inline-item"><i class="ti ti-color-swatch"></i> UX Designer</li>
                              <li class="list-inline-item"><i class="ti ti-map-pin"></i> Vatican City</li>
                              <li class="list-inline-item"><i class="ti ti-calendar"></i> Joined April 2021</li>
                            </ul>
                          </div>
                          <a href="javascript:void(0)" class="btn btn-primary">
                            <i class="ti ti-edit me-1"></i>Update
                          </a>
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
                      <a class="nav-link" href="pages-profile-teams.html"
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
                      <form>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="ti ti-user"></i
                              ></span>
                              <input
                                type="text"
                                class="form-control"
                                id="basic-icon-default-fullname"
                                placeholder="Masukan nama"
                                aria-label="Masukan nama"
                                aria-describedby="basic-icon-default-fullname2"
                                value="{{ $psikologProfile->nama }}"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i class="ti ti-mail"></i></span>
                              <input
                                type="text"
                                id="basic-icon-default-email"
                                class="form-control"
                                placeholder="Masukan Email"
                                aria-label="Masukan Email"
                                aria-describedby="basic-icon-default-email2"
                                value="{{ $psikologProfile->email }}"
                              />
                              {{-- <span id="basic-icon-default-email2" class="input-group-text">@example.com</span> --}}
                            </div>
                            {{-- <div class="form-text">You can use letters, numbers & periods</div> --}}
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Password</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i class="ti ti-key"></i></span>
                              <input
                                type="password"
                                id="basic-icon-default-email"
                                class="form-control"
                                placeholder="******"
                                aria-label="******"
                                aria-describedby="basic-icon-default-email2"
                              />
                              {{-- <span id="basic-icon-default-email2" class="input-group-text">@example.com</span> --}}
                            </div>
                            <div class="form-text">Tulis ulang jika ingin mengganti password</div>
                          </div>
                        </div>
                      <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Jenis Kelamin</label>
                          <div class="col-sm-10">
                              <div class="input-group input-group-merge">
                                  <select
                                      class="selectpicker w-100 show-tick"
                                      id="selectpickerIcons"
                                      data-icon-base="ti"
                                      data-tick-icon="ti-check"
                                      data-style="btn-default"
                                  >
                                      <option data-icon="ti ti-gender-male" value="Laki-Laki" {{ $psikologProfile->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                      <option data-icon="ti ti-gender-female" value="Perempuan" {{ $psikologProfile->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Tanggal Lahir</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i class="ti ti-calendar"></i></span>
                              <input type="text" value="{{ $psikologProfile->tanggal_lahir }}" class="form-control" placeholder="YYYY-MM-DD" id="flatpickr-date" />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="basic-icon-default-phone">Tempat Lahir</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="ti ti-map-pin"></i
                              ></span>
                              <input
                                type="text"
                                id="basic-icon-default-phone"
                                class="form-control phone-mask"
                                placeholder="Masukan tempat lahir"
                                aria-label="Masukan tempat lahir"
                                aria-describedby="basic-icon-default-phone2"
                                value="{{ $psikologProfile->tempat_lahir }}"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="basic-icon-default-phone">Universitas</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="ti ti-building-arch"></i
                              ></span>
                              <input
                                type="text"
                                id="basic-icon-default-phone"
                                class="form-control phone-mask"
                                placeholder="Masukan universitas"
                                aria-label="Masukan universitas"
                                aria-describedby="basic-icon-default-phone2"
                                value="{{ $psikologProfile->asal_universitas }}"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="basic-icon-default-phone">Program Studi</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="ti ti-building"></i
                              ></span>
                              <input
                                type="text"
                                id="basic-icon-default-phone"
                                class="form-control phone-mask"
                                placeholder="Masukan program studi"
                                aria-label="Masukan program studi"
                                aria-describedby="basic-icon-default-phone2"
                                value="{{ $psikologProfile->program_studi }}"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="basic-icon-default-phone">Tahun Lulus</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="ti ti-calendar-stats"></i
                              ></span>
                              <input
                                type="text"
                                id="basic-icon-default-phone"
                                class="form-control phone-mask"
                                placeholder="Masukan tahun lulus"
                                aria-label="Masukan tahun lulus"
                                aria-describedby="basic-icon-default-phone2"
                                value="{{ $psikologProfile->tahun_lulus }}"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="basic-icon-default-phone">Tempat Praktik</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="ti ti-building-community"></i
                              ></span>
                              <input
                                type="text"
                                id="basic-icon-default-phone"
                                class="form-control phone-mask"
                                placeholder="Masukan tempat praktik"
                                aria-label="Masukan tempat praktik"
                                aria-describedby="basic-icon-default-phone2"
                                value="{{ $psikologProfile->tempat_praktik }}"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="basic-icon-default-message">Deskripsi</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-message2" class="input-group-text"
                                ><i class="ti ti-menu"></i
                              ></span>
                              <textarea
                                id="basic-icon-default-message"
                                class="form-control"
                                placeholder="Hi, Do you have a moment to talk Joe?"
                                aria-label="Hi, Do you have a moment to talk Joe?"
                                aria-describedby="basic-icon-default-message2"
                              >{{ $psikologProfile->deskripsi }}</textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="basic-icon-default-phone">Bidang</label>
                          <div class="col-sm-10">
                             <div class="select2-primary">
                            <select id="select2Primary" class="select2 form-select" multiple>
                              <option value="1" selected>Option1</option>
                              <option value="2" selected>Option2</option>
                              <option value="3">Option3</option>
                              <option value="4">Option4</option>
                            </select>
                          </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="basic-icon-default-phone">Metode Kondultasi</label>
                          <div class="col-sm-10">
                             <div class="select2-success">
                            <select id="select2Success" class="select2 form-select" multiple>
                              <option value="1" selected>Option1</option>
                              <option value="2" selected>Option2</option>
                              <option value="3">Option3</option>
                              <option value="4">Option4</option>
                            </select>
                          </div>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Send</button>
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
