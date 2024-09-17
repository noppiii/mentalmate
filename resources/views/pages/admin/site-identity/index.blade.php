@extends('layouts.admin.main')
@section('title')
    Site Identity | {{ config('app.name') }}
@endsection
@section('pages')
    Site Identity Admin
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
                                <p>Di sini Anda dapat mengontrol dan mengelola data identity</p>
                                <button id="viewDataLink" class="btn btn-sm btn-outline-primary">View Data</button>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img
                                    src="{{ asset('image/site-identity.jpg') }}"
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
                        <h5 class="card-title mb-0">Site Identity</h5>
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
                                        @if($siteIdentity)
                                            <h5 class="mb-0">{{ $siteIdentity->name_website }}</h5>
                                        @else
                                            <h5 class="mb-0">Data tidak tersedia</h5>
                                        @endif
                                        <small>Nama Web</small>
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
                                        <h5 class="mb-0 text-warning">
                                            @if($siteIdentity)
                                                <h5 class="mb-0">{{ $siteIdentity->email }}</h5>
                                            @else
                                                <h5 class="mb-0">Data tidak tersedia</h5>
                                            @endif
                                        </h5>
                                        <small>Email</small>
                                    </div>
                                </div>
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
                                <th>Nama Website</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($siteIdentity)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $siteIdentity->id }}</td>
                                    <td>{{ $siteIdentity->nama_website }}</td>
                                    <td>{{ $siteIdentity->email }}</td>
                                    <td>
                                        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                                            <img
                                                src="{{ asset('store/site-identity/' . $siteIdentity->logo) }}"
                                                alt="Logo"
                                                style="object-fit: cover; width: 100px; height: 60px;"
                                                class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img"
                                            />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-inline-block">
                                            <a href="javascript:;"
                                               class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                               data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end m-0">
                                                <a href="{{ route('site-identity.edit', $siteIdentity->id) }}"
                                                   class="dropdown-item"><i class="ti ti-pencil me-1"></i>Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="7" class="text-center">Data tidak tersedia</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection
