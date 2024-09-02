@extends('layouts.admin.main')
@section('title')
    Dashboard | {{ config('app.name') }}
@endsection
@section('pages')
    Dashboard Admin
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <!-- Sales last year -->
                <div class="col-xl-3 col-md-4 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge p-2 bg-label-primary mb-2 rounded">
                                <i class="ti ti-users ti-md"></i>
                            </div>
                            <h5 class="card-title mb-1 pt-2">Total User</h5>
                            <small class="text-muted">This Month</small>
                            <p class="mb-2 mt-1">{{$totalUser}}</p>
                            <div class="pt-1">
                                <span class="badge bg-label-success">^ {{$totalUserMonth}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-4 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge p-2 bg-label-info mb-2 rounded">
                                <i class="ti ti-news ti-md"></i>
                            </div>
                            <h5 class="card-title mb-1 pt-2">Total Artikel</h5>
                            <small class="text-muted">This Month</small>
                            <p class="mb-2 mt-1">{{$totalArtikel}}</p>
                            <div class="pt-1">
                                <span class="badge bg-label-success">^ {{$totalArtikelMonth}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Profit -->
                <div class="col-xl-3 col-md-4 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge p-2 bg-label-secondary mb-2 rounded">
                                <i class="ti ti-category ti-md"></i>
                            </div>
                            <h5 class="card-title mb-1 pt-2">Total Konsultasi</h5>
                            <small class="text-muted">This Month</small>
                            <p class="mb-2 mt-1">{{$totalKonsultasi}}</p>
                            <div class="pt-1">
                                <span class="badge bg-label-success">^ {{$totalKonsultasiMonth}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Sales -->
                <div class="col-xl-3 col-md-4 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge p-2 bg-label-warning mb-2 rounded"><i class="ti ti-message ti-md"></i>
                            </div>
                            <h5 class="card-title mb-1 pt-2">Total Ulasan</h5>
                            <small class="text-muted">Last Month</small>
                            <p class="mb-2 mt-1">{{$totalUlasan}}</p>
                            <div class="pt-1">
                                <span class="badge bg-label-success">^ {{$totalUlasanMonth}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earning Reports Tabs-->
                <div class="col-12 col-xl-8 mb-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="card-title mb-0">
                                <h5 class="mb-0">Earning Reports</h5>
                                <small class="text-muted">Yearly Earnings Overview</small>
                            </div>
                            <div class="dropdown">
                                <button
                                    class="btn p-0"
                                    type="button"
                                    id="earningReportsTabsId"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReportsTabsId">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs widget-nav-tabs pb-3 gap-4 mx-1 d-flex flex-nowrap" role="tablist">
                                <li class="nav-item">
                                    <a
                                        href="javascript:void(0);"
                                        class="nav-link btn active d-flex flex-column align-items-center justify-content-center"
                                        role="tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#navs-orders-id"
                                        aria-controls="navs-orders-id"
                                        aria-selected="true"
                                    >
                                        <div class="badge bg-label-secondary rounded p-2">
                                            <i class="ti ti-users ti-sm"></i>
                                        </div>
                                        <h6 class="tab-widget-title mb-0 mt-2">Users</h6>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a
                                        href="javascript:void(0);"
                                        class="nav-link btn d-flex flex-column align-items-center justify-content-center"
                                        role="tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#navs-sales-id"
                                        aria-controls="navs-sales-id"
                                        aria-selected="false"
                                    >
                                        <div class="badge bg-label-secondary rounded p-2">
                                            <i class="ti ti-news ti-sm"></i>
                                        </div>
                                        <h6 class="tab-widget-title mb-0 mt-2">Arikel</h6>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a
                                        href="javascript:void(0);"
                                        class="nav-link btn d-flex flex-column align-items-center justify-content-center"
                                        role="tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#navs-profit-id"
                                        aria-controls="navs-profit-id"
                                        aria-selected="false"
                                    >
                                        <div class="badge bg-label-secondary rounded p-2">
                                            <i class="ti ti-category ti-sm"></i>
                                        </div>
                                        <h6 class="tab-widget-title mb-0 mt-2">Konsultasi</h6>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a
                                        href="javascript:void(0);"
                                        class="nav-link btn d-flex flex-column align-items-center justify-content-center"
                                        role="tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#navs-income-id"
                                        aria-controls="navs-income-id"
                                        aria-selected="false"
                                    >
                                        <div class="badge bg-label-secondary rounded p-2">
                                            <i class="ti ti-message ti-sm"></i>
                                        </div>
                                        <h6 class="tab-widget-title mb-0 mt-2">Ulasan</h6>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content p-0 ms-0 ms-sm-2">
                                <div class="tab-pane fade show active" id="navs-orders-id" role="tabpanel">
                                    <canvas id="userChart"></canvas>
                                </div>
                                <div class="tab-pane fade" id="navs-sales-id" role="tabpanel">
                                    <canvas id="articleChart"></canvas>
                                </div>
                                <div class="tab-pane fade" id="navs-profit-id" role="tabpanel">
                                    <canvas id="consultationChart"></canvas>
                                </div>
                                <div class="tab-pane fade" id="navs-income-id" role="tabpanel">
                                    <canvas id="reviewChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sales last 6 months -->
                <div class="col-md-6 col-xl-4 mb-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="card-title mb-0">
                                <h5 class="mb-0">Sales</h5>
                                <small class="text-muted">Last 6 Months</small>
                            </div>
                            <div class="dropdown">
                                <button
                                    class="btn p-0"
                                    type="button"
                                    id="salesLastMonthMenu"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesLastMonthMenu">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="bidangPsikologChart" height="400"></canvas>
                        </div>
                    </div>
                </div>

                <!-- View sales -->
                <div class="col-xl-4 mb-4 col-lg-5 col-12">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-7">
                                <div class="card-body text-nowrap">
                                    <h5 class="card-title mb-0">Congratulations {{Auth::guard('admin')->user()->nama}}!
                                        🎉</h5>
                                    <p class="mb-2">Total Transaksi Masuk</p>
                                    <h6 class="text-primary mb-1">
                                        Rp {{ number_format($totalTransaksi, 0, ',', '.') }}</h6>
                                    <a href="javascript:;" class="btn btn-primary">View transaksi</a>
                                </div>
                            </div>
                            <div class="col-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-4">
                                    <img
                                        src="{{asset('admin/assets/img/illustrations/card-advance-sale.png')}}"
                                        height="140"
                                        alt="view sales"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- View sales -->

                <!-- Statistics -->
                <div class="col-xl-8 mb-4 col-lg-7 col-12">
                    <div class="card h-100">
                        <div class="card-header">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="card-title mb-0">Statistics</h5>
                                <small class="text-muted">Updated 1 month ago</small>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row gy-3">
                                <div class="col-md-4 col-6">
                                    <div class="d-flex align-items-center">
                                        <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                            <i class="ti ti-sort-descending ti-sm"></i>
                                        </div>
                                        <div class="card-info">
                                            <h5 class="mb-0">{{$cancelTransaksi}}</h5>
                                            <small>Cancel</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <div class="d-flex align-items-center">
                                        <div class="badge rounded-pill bg-label-warning me-3 p-2">
                                            <i class="ti ti-menu ti-sm"></i>
                                        </div>
                                        <div class="card-info">
                                            <h5 class="mb-0">{{$pendingTransaksi}}</h5>
                                            <small>Pending</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <div class="d-flex align-items-center">
                                        <div class="badge rounded-pill bg-label-success me-3 p-2">
                                            <i class="ti ti-sort-ascending ti-sm"></i>
                                        </div>
                                        <div class="card-info">
                                            <h5 class="mb-0">{{$successTransaksi}}</h5>
                                            <small>Success</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Statistics -->

                <div class="col-xl-4 col-12">
                    <div class="row">

                        <!-- Generated Leads -->
                        <div class="col-xl-12 mb-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mb-1 text-nowrap">Generated Leads</h5>
                                    <div class="d-flex justify-content-between">
                                        <canvas id="metodeKonsultasiTerbanyakChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Generated Leads -->
                    </div>
                </div>

                <!-- Revenue Report -->
                <div class="col-12 col-xl-8 mb-4 col-lg-7">
                    <div class="card">
                        <div class="card-header pb-3">
                            <h5 class="m-0 me-2 card-title">Revenue Report</h5>
                        </div>
                        <div class="card-body">
                            <div class="row row-bordered g-0">
                                <div class="col-md-8">
                                    <canvas id="bidangKonsultasiChart"></canvas>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center mt-4">
                                    </div>
                                    <h3 class="text-center pt-4 mb-0">
                                        Rp {{ number_format($totalTransaksiMonth, 0, ',', '.') }}</h3>
                                    <p class="mb-4 text-center"><span class="">Pendapatan Konsultasi Sebulan</span></p>
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
        // Grafik Pengguna
        const userCtx = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(userCtx, {
            type: 'line',
            data: {
                labels: @json($months),
                datasets: [
                    {
                        label: 'Admin',
                        data: @json($adminData),
                        borderColor: 'rgba(255, 205, 86, 1)',
                        backgroundColor: 'rgba(255, 205, 86, 0.3)',
                        fill: true
                    },
                    {
                        label: 'Psikolog',
                        data: @json($psikologData),
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.3)',
                        fill: true
                    },
                    {
                        label: 'Mahasiswa',
                        data: @json($mahasiswaData),
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.3)',
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        },
                        grid: {
                            color: 'rgba(200, 200, 200, 0.2)'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Jumlah User'
                        },
                        grid: {
                            color: 'rgba(200, 200, 200, 0.2)'
                        }
                    }
                }
            }
        });

        const articleCtx = document.getElementById('articleChart').getContext('2d');
        const articleChart = new Chart(articleCtx, {
            type: 'line',
            data: {
                labels: @json($months),
                datasets: [
                    {
                        label: 'Rejected',
                        data: @json($rejectedData),
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.3)',
                        fill: true
                    },
                    {
                        label: 'Pending',
                        data: @json($pendingData),
                        borderColor: 'rgba(255, 159, 64, 1)',
                        backgroundColor: 'rgba(255, 159, 64, 0.3)',
                        fill: true
                    },
                    {
                        label: 'Accepted',
                        data: @json($acceptedData),
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.3)',
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        },
                        grid: {
                            color: 'rgba(200, 200, 200, 0.2)'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Jumlah Artikel'
                        },
                        grid: {
                            color: 'rgba(200, 200, 200, 0.2)'
                        }
                    }
                }
            }
        });

        const consultationCtx = document.getElementById('consultationChart').getContext('2d');
        const consultationChart = new Chart(consultationCtx, {
            type: 'line',
            data: {
                labels: @json($months),
                datasets: [
                    {
                        label: 'Upcoming Consultations',
                        data: @json($upcomingConsultations),
                        borderColor: 'rgba(255, 206, 86, 1)',
                        backgroundColor: 'rgba(255, 206, 86, 0.3)',
                        fill: true
                    },
                    {
                        label: 'Past Consultations',
                        data: @json($pastConsultations),
                        borderColor: 'rgba(153, 102, 255, 1)',
                        backgroundColor: 'rgba(153, 102, 255, 0.3)',
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        },
                        grid: {
                            color: 'rgba(200, 200, 200, 0.2)'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Jumlah Konsultasi'
                        },
                        grid: {
                            color: 'rgba(200, 200, 200, 0.2)'
                        }
                    }
                }
            }
        });

        const reviewCtx = document.getElementById('reviewChart').getContext('2d');
        const reviewChart = new Chart(reviewCtx, {
            type: 'line',
            data: {
                labels: @json($months),
                datasets: [
                    {
                        label: 'Jumlah Ulasan',
                        data: @json($reviewData),
                        borderColor: 'rgba(153, 102, 255, 1)',
                        backgroundColor: 'rgba(153, 102, 255, 0.3)',
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        },
                        grid: {
                            color: 'rgba(200, 200, 200, 0.2)'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Jumlah Ulasan'
                        },
                        grid: {
                            color: 'rgba(200, 200, 200, 0.2)'
                        }
                    }
                }
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('bidangPsikologChart').getContext('2d');

            var bidangNames = {!! json_encode($bidangPsikologTerbanyakChart->pluck('name')) !!};
            var psikologCounts = {!! json_encode($bidangPsikologTerbanyakChart->pluck('psikolog_count')) !!};

            var donutChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: bidangNames,
                    datasets: [{
                        label: 'Jumlah Psikolog',
                        data: psikologCounts,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
            });
        });

        var ctx = document.getElementById('bidangKonsultasiChart').getContext('2d');
        var konsultasiChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($topMetodeNominalChart->pluck('jenis_metode_konsultasi')),
                datasets: [{
                    label: 'Jumlah Konsultasi',
                    data: @json($topMetodeNominalChart->pluck('total_nominal')),
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(153, 102, 255, 0.6)'
                    ],
                    borderRadius: 10,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                }
            }
        });

        const metodeKonsultasiTerbanyakCtx = document.getElementById('metodeKonsultasiTerbanyakChart').getContext('2d');
        const metodeKonsultasiTerbanyakChart = new Chart(metodeKonsultasiTerbanyakCtx, {
            type: 'polarArea',
            data: {
                labels: @json($metodeKonsultasiTerbanyakChart->pluck('jenis_metode_konsultasi')),
                datasets: [{
                    label: 'Jumlah Konsultasi',
                    data: @json($metodeKonsultasiTerbanyakChart->pluck('konsultasi_count')),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
