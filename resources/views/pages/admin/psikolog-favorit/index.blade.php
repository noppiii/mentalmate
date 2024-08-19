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
                <div class="col-md-12">
                    <div class="card mb-4">
                        <form action="#" method="GET">
                            <div class="card-body demo-vertical-spacing demo-only-element">
                                <div class="row mb-2">
                                    <div class="col-md-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text" id="basic-addon-search31"><i
                                                    class="ti ti-search"></i></span>
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Cari data KKN..."
                                                aria-label="Cari data KKN..."
                                                aria-describedby="basic-addon-search31"
                                                name="searchkKn"
                                                {{-- value="{{ $search }}" --}}
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
                @foreach($psikologs as $data)
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
                                        <li><a class="dropdown-item" href="javascript:void(0);">Share connection</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Block connection</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider"/>
                                        </li>
                                        <li><a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mx-auto my-3">
                                    <img src="{{asset('store/user/photo/psikolog/' . $data->profile_photo_path)}}" alt="Avatar Image"
                                         class="rounded-circle w-px-100"/>
                                </div>
                                <h4 class="mb-1 card-title">{{$data->nama}}</h4>
                                <span class="pb-1">{{$data->asal_universitas}}</span>
                                <div class="d-flex align-items-center justify-content-center my-3 gap-2">
                                    <a href="javascript:;" class="me-1"><span
                                            class="badge bg-label-success"><i class="ti ti-check me-2 mb-1"></i>{{$data->status}}</span></a>
                                </div>

                                <div class="d-flex align-items-center justify-content-around my-3 py-1">
                                    <div>
                                        <h4 class="mb-0">{{$data->total_favorit }}</h4>
                                        <span>Favorite</span>
                                    </div>
                                    <div>
                                        <h4 class="mb-0">{{$data->total_bidang}}</h4>
                                        <span>Bidang</span>
                                    </div>
                                    <div>
                                        <h4 class="mb-0">{{$data->total_metode}}</h4>
                                        <span>Metode</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-4">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item prev">
                            <a class="page-link" href="javascript:void(0);"
                            ><i class="ti ti-chevrons-left ti-xs"></i
                                ></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">2</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="javascript:void(0);">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">5</a>
                        </li>
                        <li class="page-item next">
                            <a class="page-link" href="javascript:void(0);"
                            ><i class="ti ti-chevrons-right ti-xs"></i
                                ></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!--/ Teams Cards -->
        </div>
        <!-- / Content -->
    </div>

@endsection
