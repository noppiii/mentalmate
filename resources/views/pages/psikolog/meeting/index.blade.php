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
                    <h5 class="text-primary">Welcome {{ Auth::guard('psikolog')->user()->nama }}! 🎉</h5>
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
            <div class="col-lg-8 mb-4 col-md-12">
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
                            <h5 class="mb-0">10</h5>
                            <small>Total Psikolog</small>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                          <div class="badge rounded-pill bg-label-info me-3 p-2">
                            <i class="ti ti-user-plus ti-sm"></i>
                          </div>
                          <div class="card-info">
                            <h5 class="mb-0">10</h5>
                            <small>Admin Baru Bulan Ini</small>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                          <div class="badge rounded-pill bg-label-success me-3 p-2">
                            <i class="ti ti-user-plus ti-sm"></i>
                          </div>
                          <div class="card-info">
                            <h5 class="mb-0 text-success">10

                            </h5>
                            <small>Psikolog Baru</small>
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
                            <a href="{{ route('my-meeting.create') }}"
                              class="btn btn-primary mb-2 text-nowrap add-new-role d-block"
                            >
                              + Mmeeting
                            </a>
                            <small class="mb-0 mt-1 d-block">Buat Zoom Meeting</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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
                          {{-- <?php $no=1; ?>
                          @foreach($allPsikolog as $data) --}}
                          <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                
                              </td>
                              <td>
                                  
                              </td>
                              <td>
                                  <div class="d-inline-block">
                                      <a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>
                                      <div class="dropdown-menu dropdown-menu-end m-0">'
                                      <button data-bs-toggle="modal"
                                      data-bs-target="#viewUser"
                                      class="dropdown-item"><i class="ti ti-eye me-1"></i>View
                                  </button>
                                      <button
                                      data-bs-toggle="modal"
                                      data-bs-target="#addNewAddress"
                                      class="dropdown-item"><i class="ti ti-pencil me-1"></i>Edit</button>
                                      </div>
                                      </div>
                              </td>
                          </tr>
                          {{-- @endforeach --}}
                      </tbody>
                      </table>
                    </div>
                  </div>
    </div>
  </div>
@endsection
