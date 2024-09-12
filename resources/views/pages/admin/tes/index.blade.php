@extends('layouts.admin.main')
@section('title')
    Tes Kesehatan Mental | {{ config('app.name') }}
@endsection
@section('pages')
    Tes Kesehatan Mental
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Navbar pills -->
            <div class="row g-4 mb-4">
                <div class="col-sm-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span>Total Tes</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h4 class="mb-0 me-2">{{$totalTest}}</h4>
                                        {{--                                        <span class="text-success">(+29%)</span>--}}
                                    </div>
                                    <small>Total Tes Soal</small>
                                </div>
                                <span class="badge bg-label-primary rounded p-2">
                    <i class="ti ti-checklist ti-sm"></i>
                  </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span>Tes Soal</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h6 class="mb-0 me-2">10</h6>
                                        {{--                                        <span class="text-success">(+18%)</span>--}}
                                    </div>
                                    <small>Tes Soal Terbanyak</small>
                                </div>
                                <span class="badge bg-label-secondary rounded p-2">
                    <i class="ti ti-checkup-list ti-sm"></i>
                  </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span>Tambah Tes</span>
                                    <div class="d-flex align-items-center my-1">
                                        <a href="{{ route('test-kesehatan-mental.create') }}"
                                           class="btn btn-primary mt-2">+
                                            Tes</a>
                                    </div>
                                    {{-- <small>&nbsp;</small> --}}
                                </div>
                                <span class="badge bg-label-primary rounded p-2">
                    <i class="ti ti-file-plus ti-sm"></i>
                  </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mb-4">
                        <form action="{{route('test-kesehatan-mental.index')}}" method="GET">
                            <div class="card-body demo-vertical-spacing demo-only-element">
                                <div class="row mb-2">
                                    <div class="col-md-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text" id="basic-addon-search31"><i
                                                    class="ti ti-search"></i></span>
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Cari data tes..."
                                                aria-label="Cari data tes..."
                                                aria-describedby="basic-addon-search31"
                                                name="search"
                                                value="{{ $search }}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <button type="submit" class="btn btn-primary mx-1">
                                            <span class="ti ti-search me-1"></span>Cari
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--/ Navbar pills -->

            <!-- Teams Cards -->
            <div class="row g-4">
                @if(count($allTest) > 0)
                    @foreach ($allTest as $data)
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="dropdown btn-pinned">
                                        <button
                                            type="button"
                                            class="btn dropdown-toggle hide-arrow p-0"
                                            data-bs-toggle="dropdown"
                                            aria-expanded="false"
                                        >
                                            <i class="ti ti-dots-vertical text-muted"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item"
                                                   href="{{route('test-kesehatan-mental.edit', $data->id)}}"><i
                                                        class="ti ti-edit me-2"></i>Edit Tes</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider"/>
                                            </li>
                                            <li>
                                                <button data-bs-toggle="modal"
                                                        data-bs-target="#onboardHorizontalImageModal{{ $data->id }}"
                                                        class="dropdown-item text-danger"
                                                ><i class="ti ti-trash me-2"></i>Delete
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <h4 class="mb-1 card-title">{{$data->name}}</h4>
                                    <span
                                        class="pb-1">{{ implode(' ', array_slice(str_word_count($data->description, 1), 0, 20)) }}</span>

                                    <div class="d-flex align-items-center justify-content-around my-3 py-1">
                                        <div>
                                            <h4 class="mb-0">{{ $data->mental_health_questions_count }}</h4>
                                            <span>Total Pertanyaan</span>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">{{ $data->mental_health_results_count }}</h4>
                                            <span>Jumlah User</span>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">
                                                @if ($data->mentalHealthResults->isNotEmpty())
                                                    {{ number_format($data->mentalHealthResults->first()->avg_score, 2) }}
                                                @else
                                                    N/A
                                                @endif
                                            </h4>
                                            <span>Rata Rata Score</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center">
                        <img src="{{ asset('image/data-not-found.png') }}" alt="No Data Image" class="img-fluid w-40"/>
                    </div>
                @endif
            </div>
            <div class="row mt-4">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <!-- Tombol Previous -->
                        @if ($allTest->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link" aria-hidden="true">&laquo;</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $allTest->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        @endif

                        <!-- Tombol Halaman -->
                        @php
                            $start = max($allTest->currentPage() - 2, 1);
                            $end = min($start + 4, $allTest->lastPage());

                            if ($end - $start < 4) {
                                $start = max($end - 4, 1);
                            }
                        @endphp

                        @for ($i = $start; $i <= $end; $i++)
                            <li class="page-item {{ $i == $allTest->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $allTest->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        <!-- Tombol Next -->
                        @if ($allTest->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $allTest->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link" aria-hidden="true">&raquo;</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
            <!--/ Teams Cards -->
        </div>
        <!-- / Content -->
    </div>
    {{-- ====================== DELETE DATA ======================== --}}
    @foreach ($allTest as $data)
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
                            <h4 class="onboarding-title text-body text-danger">Hapus {{ $data->name }}</h4>
                            <small class="onboarding-info">
                                Dengan menghapus {{ $data->name }}, data ini akan terhapus secara permanen.
                            </small>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('test-kesehatan-mental.destroy', $data->id) }}">
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
