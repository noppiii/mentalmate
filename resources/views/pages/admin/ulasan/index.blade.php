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
            <!-- Reviews -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <!-- DataTable with Buttons -->
                <div class="card">
                    <div class="card-datatable table-responsive pt-0">
                        <table class="datatables-prodi table">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>ID</th>
                                <th>Mahasiswa</th>
                                <th>Rating</th>
                                <th>Ulasan</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; ?>
                            @foreach($allUlasan as $data)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->mahasiswa->nama }}</td>
                                    <td>{{ $data->rating }}</td>
                                    <td>{{ $data->isi }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
