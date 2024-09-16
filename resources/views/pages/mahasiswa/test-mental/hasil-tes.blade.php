@extends('layouts.admin.main')
@section('title')
    Hasil Tes | {{ config('app.name') }}
@endsection
@section('pages')
    Hasil Tes
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="text-primary">Welcome {{ Auth::guard('mahasiswa')->user()->nama }}! 🎉</h5>
                                <p>Di sini Anda dapat melihat hasil tes yang sudah dilakukan</p>
                                <button id="viewDataLink" class="btn btn-sm btn-outline-primary">View Data</button>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img
                                    src="{{ asset('image/tes.jpg') }}"
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
                        <h5 class="card-title mb-0">Statistics Hasil Tes</h5>
                        {{-- <small class="text-muted">Updated 1 month ago</small> --}}
                    </div>
                    <div class="card-body pt-2">
                        <div class="row gy-3">
                            <div class="col-md-6 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                        <i class="ti ti-signature ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{$latestTest->mentalHealthTest->name}}</h5>
                                        <small>Tes Terbaru</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-info me-3 p-2">
                                        <i class="ti ti-number ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{ $latestTest->total_score }}</h5>
                                        <small>Hasil Tes</small>
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
                        <table class="datatables-artikel table">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>ID</th>
                                <th>Nama Tes</th>
                                <th>Tanggal</th>
                                <th>Score</th>
                                <th>Hasil</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; ?>
                            @foreach($testResults as $data)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->mentalHealthTest->name }}</td> <!-- Test name from relation -->
                                    <td>{{ $data->created_at->format('d-m-Y') }}</td> <!-- Test date -->
                                    <td>{{ $data->total_score }}</td>
                                    <td>
                                        @if ($data->total_score >= 80)
                                            <span class="badge bg-label-success">Healthy</span>
                                        @elseif ($data->total_score >= 50)
                                            <span class="badge bg-label-warning">Moderate</span>
                                        @else
                                            <span class="badge bg-label-danger">Needs Attention</span>
                                        @endif
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
