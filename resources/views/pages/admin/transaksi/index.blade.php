@extends('layouts.admin.main')
@section('title')
    Transaksi | {{ config('app.name') }}
@endsection
@section('pages')
    Transaksi Admin
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
                                <p>Di sini Anda dapat mengontrol dan mengelola semua aspek artikel</p>
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
                        <h5 class="card-title mb-0">Statistics Artikel</h5>
                        {{-- <small class="text-muted">Updated 1 month ago</small> --}}
                    </div>
                    <div class="card-body pt-2">
                        <div class="row gy-3">
                            <div class="col-md-4 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                        <i class="ti ti-circle-off ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{$cancelTransaksi}}</h5>
                                        <small>Cancel Transaksi</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-warning me-3 p-2">
                                        <i class="ti ti-refresh ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{ $pendingTransaksi }}</h5>
                                        <small>Pending Transaksi</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-success me-3 p-2">
                                        <i class="ti ti-circle-check ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{$successTransaksi}}

                                        </h5>
                                        <small>Success Transaksi</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <!-- DataTable with Buttons -->
                <div class="card">
                    <div class="card-datatable table-responsive pt-0">
                        <table class="datatables-transaksi table">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>ID</th>
                                <th>Konsultasi</th>
                                <th>Nominal</th>
                                <th>Pembayaran</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; ?>
                            @foreach($allTransaksi as $data)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->konsultasi->nama }}</td>
                                    <td>{{ $data->nominal }}</td>
                                    <td>{{ $data->metode_pembayaran }}</td>
                                    <td>
                                        @if ($data->status == 'cancel')
                                            <span class="badge bg-label-danger">{{ $data->status }}</span>
                                        @elseif ($data->status == 'pending')
                                            <span class="badge bg-label-warning">{{ $data->status }}</span>
                                        @elseif ($data->status == 'success')
                                            <span class="badge bg-label-success">{{ $data->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-inline-block">
                                            <a href="javascript:;"
                                               class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                               data-bs-toggle="dropdown"><i
                                                    class="text-primary ti ti-dots-vertical"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end m-0">
                                                <button data-bs-toggle="modal"
                                                        data-bs-target="#viewUser{{ $data->id }}"
                                                        class="dropdown-item"><i class="ti ti-eye me-1"></i>Detail
                                                </button>
                                                <button data-bs-toggle="modal"
                                                        data-bs-target="#editStatus{{ $data->id }}"
                                                        class="dropdown-item"><i class="ti ti-edit me-1"></i>Status
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
        @foreach ($allTransaksi as $data)
            <div class="modal fade" id="viewUser{{ $data->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">{{ $data->konsultasi->nama }}</h3>
                                <p class="text-muted">Informasi tentang Transaksi {{ $data->konsultasi->nama }}.</p>
                            </div>
                            <form id="editUserForm" class="row g-3" onsubmit="return false">
                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">Nama Mahasiswa</label>
                                    <input
                                        type="text"
                                        id="modalEditUserName"
                                        name="modalEditUserName"
                                        class="form-control"
                                        placeholder="Masukan nama mahasiswa"
                                        value="{{ $data->konsultasi->nama }}"
                                    />
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">Jumlah Pembayaran</label>
                                    <input
                                        type="text"
                                        id="modalEditUserName"
                                        name="modalEditUserName"
                                        class="form-control"
                                        placeholder="Masukan Jumlah Pembayaran"
                                        value="{{ $data->nominal }}"
                                    />
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">Metode Pembayaran</label>
                                    <input
                                        type="text"
                                        id="modalEditUserName"
                                        name="modalEditUserName"
                                        class="form-control"
                                        placeholder="Masukan Jumlah Pembayaran"
                                        value="{{ $data->metode_pembayaran }}"
                                    />
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">Status</label>
                                    <input
                                        type="text"
                                        id="modalEditUserName"
                                        name="modalEditUserName"
                                        class="form-control"
                                        placeholder="Masukan status pembayaran"
                                        value="{{ $data->status }}"
                                    />
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">Waktu Transaksi</label>
                                    <input
                                        type="text"
                                        id="modalEditUserName"
                                        name="modalEditUserName"
                                        class="form-control"
                                        placeholder="Masukan waktu pembayaran"
                                        value="{{ $data->waktu_transaksi ?? 'Belum Melakukan Transaksi' }}"
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
        @foreach ($allTransaksi as $data)
            <div class="modal fade" id="editStatus{{ $data->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">{{ $data->konsultasi->nama }}</h3>
                                <p class="text-muted">Edit Status Transaksi {{ $data->konsultasi->nama }}.</p>
                            </div>
                            <form id="addNewAddressForm" class="row g-3"
                                  action="{{ route('transaksi.update', $data->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md mb-md-0 mb-3">
                                            <div class="form-check custom-option custom-option-icon">
                                                <label class="form-check-label custom-option-content"
                                                       for="customRadioHome">
                                    <span class="custom-option-body">
                                        <i class="ti ti-circle-off"></i>
                                        <span class="custom-option-title">Cancel</span>
                                        <small> Cancel pembayaran ini </small>
                                    </span>
                                                    <input
                                                        name="status"
                                                        class="form-check-input"
                                                        type="radio"
                                                        value="cancel"
                                                        id="customRadioHome"
                                                        {{ $data->status == 'cancel' ? 'checked' : '' }}
                                                    />
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md mb-md-0 mb-3">
                                            <div class="form-check custom-option custom-option-icon">
                                                <label class="form-check-label custom-option-content"
                                                       for="customRadioPending">
                                    <span class="custom-option-body">
                                       <i class="ti ti-refresh"></i>
                                        <span class="custom-option-title"> Pending </span>
                                        <small> Pending pembayaran ini </small>
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
                                                <label class="form-check-label custom-option-content"
                                                       for="customRadioActive">
                                    <span class="custom-option-body">
                                       <i class="ti ti-circle-check"></i>
                                        <span class="custom-option-title"> Success </span>
                                        <small> Terima pembayaran ini </small>
                                    </span>
                                                    <input
                                                        name="status"
                                                        class="form-check-input"
                                                        type="radio"
                                                        value="success"
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
    @endforeach
@endsection
