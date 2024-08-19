@extends('layouts.admin.main')
@section('title')
    Mentalmate || Admin
@endsection
@section('pages')
    Master Admin
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
                                <p>Di sini Anda dapat mengontrol dan mengelola semua aspek Banner</p>
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
            <div class="col-lg-8 mb-4 col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0">Statistics Banner</h5>
                        {{-- <small class="text-muted">Updated 1 month ago</small> --}}
                    </div>
                    <div class="card-body pt-2">
                        <div class="row gy-3">
                            <div class="col-md-4 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                        <i class="ti ti-news ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{$totalBanner}}</h5>
                                        <small>Total Banner</small>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-4 col-6">
                              <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-info me-3 p-2">
                                  <i class="ti ti-user-plus ti-sm"></i>
                                </div>
                                <div class="card-info">
                                  <h5 class="mb-0">{{ $newAdminThisMonth }}</h5>
                                  <small>Admin Baru Bulan Ini</small>
                                </div>
                              </div>
                            </div> --}}
                            <div class="col-md-8 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-warning me-3 p-2">
                                        <i class="ti ti-news-off ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0 text-warning">{{$newBanner->judul}}

                                        </h5>
                                        <small>Banner Banner</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews -->
            <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
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
                                <a href="{{ route('banner.create') }}"
                                   class="btn btn-primary mb-2 text-nowrap add-new-role d-block"
                                >
                                    + Banner
                                </a>
                                <small class="mb-0 mt-1 d-block">Tambah Banner</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-xxl flex-grow-1 container-p-y">
                <!-- DataTable with Buttons -->
                <div class="card">
                    <div class="card-datatable table-responsive pt-0">
                        <table class="datatables-artikel table">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Status</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; ?>
                            @foreach($allBanner as $data)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->judul }}</td>
                                    <td>
                                        @if ($data->status == 'disable')
                                            <span class="badge bg-label-danger">{{ $data->status }}</span>
                                        @elseif ($data->status == 'enable')
                                            <span class="badge bg-label-success">{{ $data->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                                            <img
                                                src="{{ asset('store/banner/' . $data->gambar) }}"
                                                alt="user image"
                                                style="object-fit: cover; width: 300px; height: 60px;"
                                                class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img"
                                            />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-inline-block">
                                            <a href="javascript:;"
                                               class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                               data-bs-toggle="dropdown"><i
                                                    class="text-primary ti ti-dots-vertical"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end m-0">'
                                                <button data-bs-toggle="modal"
                                                        data-bs-target="#viewUser{{ $data->id }}"
                                                        class="dropdown-item"><i class="ti ti-eye me-1"></i>View
                                                </button>
                                                <button data-bs-toggle="modal"
                                                        data-bs-target="#editStatus{{ $data->id }}"
                                                        class="dropdown-item"><i class="ti ti-edit me-1"></i>Status
                                                </button>
                                                <a href="{{ route('banner.edit', $data->id) }}"
                                                   class="dropdown-item"><i class="ti ti-pencil me-1"></i>Edit</a>
                                                <div class="dropdown-divider"></div>
                                                <button data-bs-toggle="modal"
                                                        data-bs-target="#onboardHorizontalImageModal{{ $data->id }}"
                                                        class="dropdown-item text-danger delete-record"><i
                                                        class="ti ti-trash me-1"></i>Delete
                                                </button>
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
        @foreach ($allBanner as $data)
            <div class="modal fade" id="viewUser{{ $data->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">{{ $data->judul }}</h3>
                                <p class="text-muted">Informasi tentang {{ $data->judul }}.</p>
                            </div>
                            <form id="editUserForm" class="row g-3" onsubmit="return false">
                                <div class="col-12 text-center">
                                    <div class="onboarding-media">
                                        <img
                                            src="{{ asset('store/banner/' . $data->gambar) }}"
                                            alt="boy-verify-email-light"
                                            width="273"
                                            class="img-fluid"
                                            data-app-light-img="illustrations/boy-verify-email-light.png"
                                            data-app-dark-img="illustrations/boy-verify-email-dark.png"
                                        />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">Judul Banner</label>
                                    <input
                                        type="text"
                                        id="modalEditUserName"
                                        name="modalEditUserName"
                                        class="form-control"
                                        placeholder="Masukan judul banner"
                                        value="{{ $data->judul }}"
                                    />
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">Link</label>
                                    <input
                                        type="text"
                                        id="modalEditUserName"
                                        name="modalEditUserName"
                                        class="form-control"
                                        placeholder="Masukan Penulis banner"
                                        value="{{ $data->link }}"
                                    />
                                </div>
                                <div class="col-12 text-center">
                                    <button type="reset" data-bs-dismiss="modal"
                                            aria-label="Close"
                                            class="btn btn-primary me-sm-3 me-1">Close
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- ============= EDIT STATUS DATA =============== --}}
        @foreach ($allBanner as $data)
            <div class="modal fade" id="editStatus{{ $data->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">{{ $data->name }}</h3>
                                <p class="text-muted">Edit Status {{ $data->name }}.</p>
                            </div>
                            <form id="editUserForm" class="row g-3"
                                  action="{{ route('banner.updateStatus', ['id' => $data->id]) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="col-12 mb-4">
                                    <select
                                        id="modalEditUserCountry"
                                        name="status"
                                        class="select2 form-select"
                                        data-allow-clear="true"
                                    >
                                        <option value="">Pilih Status Banner</option>
                                        <option value="disable" {{ $data->status === 'disable' ? 'selected' : '' }}>
                                            Disable
                                        </option>
                                        <option value="enable" {{ $data->status === 'enable' ? 'selected' : '' }}>
                                            Enable
                                        </option>
                                    </select>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                    <button
                                        type="reset"
                                        class="btn btn-label-secondary btn-reset"
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
        @endforeach

        {{-- ====================== DELETE DATA ======================== --}}
        @foreach ($allBanner as $data)
            <div
                class="modal-onboarding modal fade animate__animated"
                id="onboardHorizontalImageModal{{ $data->id }}"
                tabindex="-1"
                aria-hidden="true"
            >
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content text-center">
                        <div class="modal-header border-0">
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body onboarding-horizontal p-0 d-block">
                            <div class="onboarding-media">
                                <img
                                    src="{{ asset('image/delete.jpg') }}"
                                    alt="boy-verify-email-light"
                                    width="273"
                                    class="img-fluid"
                                    data-app-light-img="illustrations/boy-verify-email-light.png"
                                    data-app-dark-img="illustrations/boy-verify-email-dark.png"
                                />
                            </div>
                            <div class="onboarding-content mb-0">
                                <h4 class="onboarding-title text-body text-danger">Hapus {{ $data->nama }}</h4>
                                <small class="onboarding-info">
                                    Dengan menghapus {{ $data->nama }}, data ini akan terhapus secara permanen.
                                </small>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('banner.destroy', $data->id) }}">
                            @csrf
                            @method('DELETE')
                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    @endforeach
@endsection
