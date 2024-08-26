@extends('layouts.admin.main')
@section('title')
    Mentalmate || Psikolog
@endsection
@section('pages')
    Master Psikolog
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
              <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                  <div class="card-body">
                    <h5 class="text-primary">Welcome {{ Auth::guard('admin')->user()->nama }}! 🎉</h5>
                    <p>Di sini Anda dapat mengontrol dan mengelola semua aspek psikolog</p>
                    <button id="viewDataLink" class="btn btn-sm btn-outline-primary">View Data</button>
                  </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                  <div class="card-body pb-0 px-0 px-md-4">
                    <img
                      src="{{ asset('image/admin.jpg') }}"
                      height="150"
                      alt="View Badge User"
                      data-app-dark-img="illustrations/man-with-laptop-dark.png"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
            <!-- Statistics -->
            <div class="col-lg-12 mb-4 col-md-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Statistics Psikolog</h5>
                    {{-- <small class="text-muted">Updated 1 month ago</small> --}}
                  </div>
                  <div class="card-body pt-2">
                    <div class="row gy-3">
                      <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                          <div class="badge rounded-pill bg-label-primary me-3 p-2">
                            <i class="ti ti-users ti-sm"></i>
                          </div>
                          <div class="card-info">
                            <h5 class="mb-0">{{$totalPsikolog}}</h5>
                            <small>Total Psikolog</small>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                          <div class="badge rounded-pill bg-label-danger me-3 p-2">
                            <i class="ti ti-user-minus ti-sm"></i>
                          </div>
                          <div class="card-danger">
                            <h5 class="mb-0 text-danger">{{$suspendPsikolog}}</h5>
                            <small>Status Suspend</small>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                          <div class="badge rounded-pill bg-label-warning me-3 p-2">
                            <i class="ti ti-user-exclamation ti-sm"></i>
                          </div>
                          <div class="card-warning">
                            <h5 class="mb-0 text-warning">{{$pendingPsikolog}}

                            </h5>
                            <small>Status Pending</small>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                          <div class="badge rounded-pill bg-label-success me-3 p-2">
                            <i class="ti ti-user-plus ti-sm"></i>
                          </div>
                          <div class="card-success">
                            <h5 class="mb-0 text-success">{{$verifiedPsikolog}}

                            </h5>
                            <small>Status Verified</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

                <!-- Reviews -->
                {{-- <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                    <div class="card h-100">
                      <div class="row h-100">
                        <div class="col-sm-5">
                          <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                            <img
                              src="{{ asset('image/add-user.jpg') }}"
                              class="img-fluid mt-sm-4 mt-md-0"
                              alt="add-new-roles"
                              width="100"
                            />
                          </div>
                        </div>
                        <div class="col-sm-7">
                          <div class="card-body text-sm-end text-center ps-sm-0">
                            <a href="{{ route('psikolog.create') }}"
                              class="btn btn-primary mb-2 text-nowrap add-new-role d-block"
                            >
                              + Psikolog
                            </a>
                            <small class="mb-0 mt-1 d-block">Tambah psikolog untuk manage resource</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> --}}
              <div class="container-xxl flex-grow-1 container-p-y">
                <!-- DataTable with Buttons -->
                <div class="card">
                    <div class="card-datatable table-responsive pt-0">
                      <table class="datatables-basic table">
                        <thead>
                          <tr>
                            <th></th>
                            <th></th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Universitas</th>
                            <th>Status</th>
                            <th>Foto</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1; ?>
                          @foreach($allPsikolog as $data)
                          <tr>
                              <td></td>
                              <td></td>
                              <td>{{ $data->id }}</td>
                              <td>{{ $data->nama }}</td>
                              <td>{{ $data->jenis_kelamin }}</td>
                              <td>{{ $data->asal_universitas }}</td>
                              <td>
                                @if ($data->status == 'verified')
                                <span class="badge bg-label-success">{{ $data->status }}</span>
                                @elseif ($data->status == 'pending')
                                <span class="badge bg-label-warning">{{ $data->status }}</span>
                                @elseif ($data->status == 'suspended')
                                <span class="badge bg-label-danger">{{ $data->status }}</span>
                                @endif
                              </td>
                              <td>
                                  <div class="avatar avatar-md">
                                  <img src="{{ asset('store/user/photo/psikolog/' . $data->profile_photo_path) }}" alt="Avatar" class="rounded-circle" />
                                </div>
                              </td>
                              <td>
                                  <div class="d-inline-block">
                                      <a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>
                                      <div class="dropdown-menu dropdown-menu-end m-0">'
                                      <button data-bs-toggle="modal"
                                      data-bs-target="#viewUser{{ $data->id }}"
                                      class="dropdown-item"><i class="ti ti-eye me-1"></i>View
                                  </button>
                                      <button
                                      data-bs-toggle="modal"
                                      data-bs-target="#addNewAddress{{ $data->id }}"
                                      class="dropdown-item"><i class="ti ti-pencil me-1"></i>Edit</button>
                                      </div>
                                      </div>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                      </table>
                    </div>
                  </div>
    </div>
  </div>
  {{-- ============= SHOW DATA =============== --}}
  @foreach ($allPsikolog as $data)
  <div class="modal fade" id="viewUser{{ $data->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2">{{ $data->nama }}</h3>
            <p class="text-muted">Informasi tentang  {{ $data->nama }}.</p>
          </div>
          <form id="editUserForm" class="row g-3" onsubmit="return false">
            <div class="col-12 text-center">
                <div class="onboarding-media d-flex justify-content-center align-items-center">
                    <div class="avatar avatar-xl">
                        <img src="{{ asset('store/user/photo/psikolog/' . $data->profile_photo_path) }}" alt="Avatar" class="rounded-circle" />
                    </div>
                </div>
            </div>
            <div class="col-12">
              <label class="form-label" for="modalEditUserName">Nama</label>
              <input
                type="text"
                id="modalEditUserName"
                name="modalEditUserName"
                class="form-control"
                placeholder="Masukan nama psikolog"
                value="{{ $data->nama }}"
              />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserEmail">Email</label>
              <input
                type="text"
                id="modalEditUserEmail"
                name="modalEditUserEmail"
                class="form-control"
                placeholder="xxxxxx@xxx.xx"
                value="{{ $data->email }}"
              />
            </div>
            <div class="col-12 col-md-6 form-password-toggle">
                <label class="form-label" for="basic-default-password32">Password</label>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    class="form-control"
                    id="basic-default-password32"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="basic-default-password"
                    value="{{ $data->password }}"
                  />
                  <span class="input-group-text cursor-pointer" id="basic-default-password"
                    ><i class="ti ti-eye-off"></i
                  ></span>
                </div>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserPhone">Status</label>
              <div class="input-group">
                <input
                  type="text"
                  id="modalEditUserPhone"
                  name="modalEditUserPhone"
                  class="form-control phone-number-mask"
                  placeholder="status"
                  value="{{ $data->status }}"
                />
              </div>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label" for="modalEditUserEmail">Jenis Kelamin</label>
                <input
                  type="text"
                  id="modalEditUserEmail"
                  name="modalEditUserEmail"
                  class="form-control"
                  placeholder="masukan jenis kelamin"
                  value="{{ $data->jenis_kelamin }}"
                />
              </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserPhone">Tempat Lahir</label>
              <div class="input-group">
                <input
                  type="text"
                  id="modalEditUserPhone"
                  name="modalEditUserPhone"
                  class="form-control phone-number-mask"
                  placeholder="masukan tempat lahir"
                  value="{{ $data->tempat_lahir }}"
                />
              </div>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserPhone">Tanggal Lahir</label>
              <div class="input-group">
                <input
                  type="text"
                  id="modalEditUserPhone"
                  name="modalEditUserPhone"
                  class="form-control phone-number-mask"
                  placeholder="masukan tanggal lahir"
                  value="{{ $data->tanggal_lahir }}"
                />
              </div>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserPhone">Universitas</label>
              <div class="input-group">
                <input
                  type="text"
                  id="modalEditUserPhone"
                  name="modalEditUserPhone"
                  class="form-control phone-number-mask"
                  placeholder="masukan universitas"
                  value="{{ $data->asal_universitas }}"
                />
              </div>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserPhone">Program Studi</label>
              <div class="input-group">
                <input
                  type="text"
                  id="modalEditUserPhone"
                  name="modalEditUserPhone"
                  class="form-control phone-number-mask"
                  placeholder="masukan program studi"
                  value="{{ $data->program_studi }}"
                />
              </div>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserPhone">Tahun Lulus</label>
              <div class="input-group">
                <input
                  type="text"
                  id="modalEditUserPhone"
                  name="modalEditUserPhone"
                  class="form-control phone-number-mask"
                  placeholder="masukan tahun lulus"
                  value="{{ $data->tahun_lulus }}"
                />
              </div>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserPhone">No. Surat Tanda Registrasi</label>
              <div class="input-group">
                <input
                  type="text"
                  id="modalEditUserPhone"
                  name="modalEditUserPhone"
                  class="form-control phone-number-mask"
                  placeholder="masukan surat tanda registrasi "
                  value="{{ $data->no_str }}"
                />
              </div>
            </div>
            <div class="col-12">
                <label class="form-label" for="modalEditUserLanguage">Tempat Praktik</label>
                    <textarea
                      id="basic-icon-default-message"
                      class="form-control"
                      placeholder="Masukan tempat praktik"
                      aria-label="Masukan tempat praktik"
                      aria-describedby="basic-icon-default-message2"
                    >{{ $data->tempat_praktik }}</textarea>
              </div>
            <div class="col-12">
              <label class="form-label" for="modalEditUserLanguage">Dokumen</label>
              <div class="d-flex">
                <a href="" class="btn btn-outline-primary mx-1">
                    <i class="tf-icons ti ti-file ti-xs me-1"></i> CV
                  </a>
                <a href="" class="btn btn-outline-success mx-1">
                    <i class="tf-icons ti ti-file ti-xs me-1"></i> Ijazah
                  </a>
                <a href="" class="btn btn-outline-warning mx-1">
                    <i class="tf-icons ti ti-file ti-xs me-1"></i> STR
                  </a>
                <a href="" class="btn btn-outline-danger mx-1">
                    <i class="tf-icons ti ti-file ti-xs me-1"></i> Izin Praktik
                  </a>
              </div>
            </div>
            <div class="col-12 text-center">
              <button type="reset" data-bs-dismiss="modal"
              aria-label="Close"
               class="btn btn-primary me-sm-3 me-1">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach

 @foreach ($allPsikolog as $data)
      <!-- Add New Address Modal -->
      <div class="modal fade" id="addNewAddress{{ $data->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
          <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="text-center mb-4">
                <h3 class="address-title mb-2">Ubah Status Psikolog</h3>
                <p class="text-muted address-subtitle">Ubah status psikolog deactive, pending, active</p>
              </div>
                <form id="addNewAddressForm" class="row g-3" action="{{ route('psikolog.update', $data->id) }}"
                      method="post">
                    @csrf
                    @method('PUT')
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md mb-md-0 mb-3">
                                <div class="form-check custom-option custom-option-icon">
                                    <label class="form-check-label custom-option-content" for="customRadioHome">
                                    <span class="custom-option-body">
                                        <i class="ti ti-user-off"></i>
                                        <span class="custom-option-title">Suspended</span>
                                        <small> Psikolog tidak bisa mengakses resource </small>
                                    </span>
                                        <input
                                            name="status"
                                            class="form-check-input"
                                            type="radio"
                                            value="suspended"
                                            id="customRadioHome"
                                            {{ $data->status == 'suspended' ? 'checked' : '' }}
                                        />
                                    </label>
                                </div>
                            </div>
                            <div class="col-md mb-md-0 mb-3">
                                <div class="form-check custom-option custom-option-icon">
                                    <label class="form-check-label custom-option-content" for="customRadioPending">
                                    <span class="custom-option-body">
                                       <i class="ti ti-user"></i>
                                        <span class="custom-option-title"> Pending </span>
                                        <small> Psikolog menunggu verifikasi data </small>
                                    </span>
                                        <input
                                            name="status"
                                            class="form-check-input"
                                            type="radio"
                                            value="pending"
                                            id="customRadioPending"
                                            {{ $data->status == 'pending' ? 'checked' : '' }}
                                        />
                                    </label>
                                </div>
                            </div>
                            <div class="col-md mb-md-0 mb-3">
                                <div class="form-check custom-option custom-option-icon">
                                    <label class="form-check-label custom-option-content" for="customRadioActive">
                                    <span class="custom-option-body">
                                       <i class="ti ti-user"></i>
                                        <span class="custom-option-title"> Verified </span>
                                        <small> Psikolog dapat mengakses resource </small>
                                    </span>
                                        <input
                                            name="status"
                                            class="form-check-input"
                                            type="radio"
                                            value="verified"
                                            id="customRadioActive"
                                            {{ $data->status == 'verified' ? 'checked' : '' }}
                                        />
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                        <button
                            type="reset"
                            class="btn btn-label-secondary"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        >
                            Cancel
                        </button>
                    </div>
                </form>

            </div>
          </div>
        </div>
      </div>
      <!--/ Add New Address Modal -->
 @endforeach
@endsection
