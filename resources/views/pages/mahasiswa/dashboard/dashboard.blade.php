@extends('layouts.admin.main')
@section('title')
    Dashboard | {{ config('app.name') }}
@endsection
@section('pages')
    Dashboard Mahasiswa
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-xl-3 col-md-4 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge p-2 bg-label-primary mb-2 rounded">
                                <i class="ti ti-news ti-md"></i>
                            </div>
                            <h5 class="card-title mb-1 pt-2">Upcoming Meeting</h5>
                            <small class="text-muted">This Month</small>
                            <p class="mb-2 mt-1">{{$upcomingMeetingsCount}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-4 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge p-2 bg-label-info mb-2 rounded">
                                <i class="ti ti-calendar-event ti-md"></i>
                            </div>
                            <h5 class="card-title mb-1 pt-2">Jadwal Meeting</h5>
                            <small class="text-muted">Jadwal Meeting Akan Datang</small>
                            <p class="mb-2 mt-1">{{$nearestMeeting}}</p>
                            {{--                            <div class="pt-1">--}}
                            {{--                                <span class="badge bg-label-success">^ {{$totalJadwalDay}}</span>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>

                <!-- Total Profit -->
                <div class="col-xl-3 col-md-4 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge p-2 bg-label-secondary mb-2 rounded">
                                <i class="ti ti-camera ti-md"></i>
                            </div>
                            <h5 class="card-title mb-1 pt-2">Pending Transaction</h5>
                            <small class="text-muted">Your Transaction is Pending</small>
                            <p class="mb-2 mt-1">{{$pendingTransactions}}</p>
                            {{--                            <div class="pt-1">--}}
                            {{--                                <span class="badge bg-label-success">^ {{$meetingToday}} hari ini</span>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>

                <!-- Total Sales -->
                <div class="col-xl-3 col-md-4 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge p-2 bg-label-warning mb-2 rounded"><i class="ti ti-messages ti-md"></i>
                            </div>
                            <h5 class="card-title mb-1 pt-2">Konsultasi</h5>
                            <small class="text-muted">Last Month</small>
                            <p class="mb-2 mt-1">0</p>
                        </div>
                    </div>
                </div>

                <!-- Revenue Report -->
                <div class="col-12 col-xl-12 mb-4 col-lg-7">
                    <div class="card">
                        <div class="card-header pb-3">
                            <h5 class="m-0 me-2 card-title">Revenue Report</h5>
                        </div>
                        <div class="card-body">
                            <div class="row row-bordered g-0">
                                <div class="col-md-8">
                                    <canvas id="meetingChart"></canvas>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center mt-4">
                                        <div class="dropdown">
                                            <button
                                                class="btn btn-sm btn-outline-primary dropdown-toggle"
                                                type="button"
                                                id="budgetId"
                                                data-bs-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                            >
                                                <script>
                                                    document.write(new Date().getFullYear());
                                                </script>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="budgetId">
                                                <a class="dropdown-item prev-year1" href="javascript:void(0);">
                                                    <script>
                                                        document.write(new Date().getFullYear() - 1);
                                                    </script>
                                                </a>
                                                <a class="dropdown-item prev-year2" href="javascript:void(0);">
                                                    <script>
                                                        document.write(new Date().getFullYear() - 2);
                                                    </script>
                                                </a>
                                                <a class="dropdown-item prev-year3" href="javascript:void(0);">
                                                    <script>
                                                        document.write(new Date().getFullYear() - 3);
                                                    </script>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="text-center pt-4 mb-0">
                                        {{$upcomingMeetingsCount}}
                                    </h3>
                                    <div class="px-3">
                                        <div id="budgetChart"></div>
                                    </div>
                                    <div class="text-center mt-4">
                                        <a href="{{route('mahasiswa.listMeeting')}}" class="btn btn-primary">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Revenue Report -->
            </div>
        </div>
        <!-- / Content -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('meetingChart').getContext('2d');
        var revenueChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    'January', 'February', 'March', 'April', 'May', 'June',
                    'July', 'August', 'September', 'October', 'November', 'December'
                ],
                datasets: [
                    {
                        label: 'Passed Meetings',
                        data: @json(array_values($monthlyMeetings['passed'])),
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderWidth: 1,
                        tension: 0.4,
                        fill: true,
                    },
                    {
                        label: 'Upcoming Meetings',
                        data: @json(array_values($monthlyMeetings['upcoming'])),
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderWidth: 1,
                        tension: 0.4,
                        fill: true,
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                elements: {
                    line: {
                        borderJoinStyle: 'round'
                    },
                    point: {
                        radius: 5,
                        borderWidth: 2,
                        hoverRadius: 7,
                        hoverBorderWidth: 3
                    }
                },
                plugins: {
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    }
                }
            }
        });
    </script>
@endsection
