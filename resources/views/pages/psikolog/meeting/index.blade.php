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
            <div class="col-lg-12 mb-4 col-md-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Statistics Psikolog</h5>
                    {{-- <small class="text-muted">Updated 1 month ago</small> --}}
                  </div>
                  <div class="card-body pt-2">
                    <div class="row gy-3">
                      <div class="col-md-4 col-6">
                        <div class="d-flex align-items-center">
                          <div class="badge rounded-pill bg-label-primary me-3 p-2">
                            <i class="ti ti-camera ti-sm"></i>
                          </div>
                          <div class="card-info">
                            <h5 class="mb-0">{{ $countMeeting }}</h5>
                            <small>Total Meeting</small>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-6">
                        <div class="d-flex align-items-center">
                          <div class="badge rounded-pill bg-label-info me-3 p-2">
                            <i class="ti ti-camera-plus ti-sm"></i>
                          </div>
                          <div class="card-info">
                            <h5 class="mb-0">{{ $upcomingMeetingsCount }}</h5>
                            <small>Upcoming Meeting</small>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-6">
                        <div class="d-flex align-items-center">
                          <div class="badge rounded-pill bg-label-success me-3 p-2">
                            <i class="ti ti-camera-minus ti-sm"></i>
                          </div>
                          <div class="card-info">
                            <h5 class="mb-0 text-success">{{ $passedMeetingsCount }}</h5>
                            <small>Passed Meeting</small>
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
                      <table class="datatables-basic table">
                        <thead>
                          <tr>
                            <th></th>
                            <th></th>
                            <th>Meeting ID</th>
                            <th>Mahasiswa</th>
                            <th>Waktu Meeting</th>
                            <th>Agenda</th>
                            <th>Link</th>
                            <th>Password</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1; ?>
                          @foreach($allMeeting as $data)
                          <tr>
                              <td></td>
                              <td></td>
                              <td>{{ $data->meeting_id }}</td>
                              <td>{{ $data->konsultasi->nama }}</td>
                              <td>{{ \Carbon\Carbon::parse($data->start_time)->timezone('Asia/Jakarta')->format('d F Y H:i') }}</td>
                              <td>{{ $data->agenda }}</td>
                              <td>{{ $data->link }}</td>
                              <td>{{ $data->password }}</td>
                              <td>
                                  <button
                                  data-bs-toggle="modal"
                                  data-bs-target="#addNewAddress"
                                  class="dropdown-item text-danger"><i class="ti ti-trash-x me-1 mb-1"></i>Delete</button>
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
@endsection
