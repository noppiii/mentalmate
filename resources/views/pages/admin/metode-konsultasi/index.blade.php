@extends('layouts.admin.main')
@section('title')
    Admin || Dashboard
@endsection
@section('pages')
    Dashboard
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Navbar pills -->
            <div class="row g-4 mb-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span>Total Metode</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h4 class="mb-0 me-2">{{$totalMetode}}</h4>
                                        {{--                                        <span class="text-success">(+29%)</span>--}}
                                    </div>
                                    <small>Total Metode Konsultasi</small>
                                </div>
                                <span class="badge bg-label-primary rounded p-2">
                    <i class="ti ti-shield-chevron ti-sm"></i>
                  </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span>Metode Konsultasi</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h6 class="mb-0 me-2">{{$metodePsikologTerbanyak->name}}</h6>
                                        {{--                                        <span class="text-success">(+18%)</span>--}}
                                    </div>
                                    <small>Konsultasi Terbanyak</small>
                                </div>
                                <span class="badge bg-label-secondary rounded p-2">
                    <i class="ti ti-shield-checkered ti-sm"></i>
                  </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span>Metode Favorit</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h6 class="mb-0 me-2">{{$metodePsikologTerfavorit->name}}</h6>
                                        {{--                                        <span class="text-danger">(-14%)</span>--}}
                                    </div>
                                    <small>Metode Konsultasi Favorit</small>
                                </div>
                                <span class="badge bg-label-info rounded p-2">
                    <i class="ti ti-shield-lock ti-sm"></i>
                  </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span>Tambah Metode</span>
                                    <div class="d-flex align-items-center my-1">
                                        <a href="{{ route('metode-konsultasi.create') }}" class="btn btn-primary mt-2">+
                                            Metode</a>
                                    </div>
                                    {{-- <small>&nbsp;</small> --}}
                                </div>
                                <span class="badge bg-label-primary rounded p-2">
                    <i class="ti ti-shield-check ti-sm"></i>
                  </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mb-4">
                        <form action="{{route('metode-konsultasi.index')}}" method="GET">
                            <div class="card-body demo-vertical-spacing demo-only-element">
                                <div class="row mb-2">
                                    <div class="col-md-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text" id="basic-addon-search31"><i
                                                    class="ti ti-search"></i></span>
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Cari data metode..."
                                                aria-label="Cari data metode..."
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
                @if(count($allMetode) > 0)
                    @foreach ($allMetode as $data)
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <a href="javascript:;" class="d-flex align-items-center">
                                            <div
                                                class="me-2 text-body h5 mb-0">{{ $data->jenis_metode_konsultasi }}</div>
                                        </a>
                                        <div class="ms-auto">
                                            <ul class="list-inline mb-0 d-flex align-items-center">
                                                <li class="list-inline-item">
                                                    <div class="dropdown">
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
                                                                   href="{{ route('metode-konsultasi.edit', $data->id) }}"><i
                                                                        class="ti ti-pencil me-2"></i>Edit Metode</a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider"/>
                                                            </li>
                                                            <li>
                                                                <button class="dropdown-item text-danger"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#onboardHorizontalImageModal{{ $data->id }}">
                                                                    <i class="ti ti-trash me-2"></i>Delete Metode
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p class="mb-3 text-justify">
                                        {{ implode(' ', array_slice(str_word_count($data->description, 1), 0, 20)) }}
                                    </p>
                                    <div class="d-flex align-items-center pt-1">
                                        <div class="d-flex align-items-center">
                                            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                                @foreach ($data->detailPsikologs as $detailPsikolog)
                                                    @if ($detailPsikolog->psikolog)
                                                        <!-- Check if psikolog exists -->
                                                        <li
                                                            data-bs-toggle="tooltip"
                                                            data-popup="tooltip-custom"
                                                            data-bs-placement="top"
                                                            title="{{ $detailPsikolog->psikolog->nama }}"
                                                            class="avatar avatar-sm pull-up"
                                                        >
                                                            <img class="rounded-circle"
                                                                 src="{{asset('store/user/photo/psikolog/' . $detailPsikolog->psikolog->profile_photo_path)}}"
                                                                 alt="{{ $detailPsikolog->psikolog->nama }}"/>
                                                        </li>
                                                    @endif
                                                @endforeach
                                                <li class="avatar avatar-sm">
                                                @if ($data->detailPsikologs->count() > 4)
                                                    <li class="avatar avatar-sm">
                                                         <span
                                                             class="avatar-initial rounded-circle pull-up"
                                                             data-bs-toggle="tooltip"
                                                             data-bs-placement="top"
                                                             title="{{ $data->detailPsikologs->count() - 4 }} more"
                                                         >{{ $data->detailPsikologs->count() - 4 }}</span
                                                         >
                                                    </li>
                                                @endif
                                            </ul>
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
                        @if ($allMetode->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link" aria-hidden="true">&laquo;</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $allMetode->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        @endif

                        <!-- Tombol Halaman -->
                        @php
                            $start = max($allMetode->currentPage() - 2, 1);
                            $end = min($start + 4, $allMetode->lastPage());

                            if ($end - $start < 4) {
                                $start = max($end - 4, 1);
                            }
                        @endphp

                        @for ($i = $start; $i <= $end; $i++)
                            <li class="page-item {{ $i == $allMetode->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $allMetode->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        <!-- Tombol Next -->
                        @if ($allMetode->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $allMetode->nextPageUrl() }}" aria-label="Next">
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
    @foreach ($allMetode as $data)
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
                    <form method="POST" action="{{ route('metode-konsultasi.destroy', $data->id) }}">
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
