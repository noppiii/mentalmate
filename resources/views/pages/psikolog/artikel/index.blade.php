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
                    <span>Artikel Anda</span>
                    <div class="d-flex align-items-center my-1">
                      <h4 class="mb-0 me-2">21,459</h4>
                      <span class="text-success">(+29%)</span>
                    </div>
                    <small>Total Artikel Yang Anda Buat</small>
                  </div>
                  <span class="badge bg-label-primary rounded p-2">
                    <i class="ti ti-news ti-sm"></i>
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
                    <span>Pending Artikel</span>
                    <div class="d-flex align-items-center my-1">
                      <h4 class="mb-0 me-2">4,567</h4>
                      <span class="text-success">(+18%)</span>
                    </div>
                    <small>Status Artikel Masih Proses</small>
                  </div>
                  <span class="badge bg-label-warning rounded p-2">
                    <i class="ti ti-article ti-sm"></i>
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
                    <span>Artikel Tertolak</span>
                    <div class="d-flex align-items-center my-1">
                      <h4 class="mb-0 me-2">19,860</h4>
                      <span class="text-danger">(-14%)</span>
                    </div>
                    <small>Status Artikel Tertolak</small>
                  </div>
                  <span class="badge bg-label-danger rounded p-2">
                    <i class="ti ti-news-off ti-sm"></i>
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
                    <span>Tambah Bidang</span>
                    <div class="d-flex align-items-center my-1">
                      <a href="{{ route('my-artikel.create') }}" class="btn btn-primary mt-2">+ Artikel</a>
                    </div>
                    {{-- <small>&nbsp;</small> --}}
                  </div>
                  <span class="badge bg-label-primary rounded p-2">
                    <i class="ti ti-browser-plus ti-sm"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card mb-4">
                <form action="#" method="GET">
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="row mb-2">
                            <div class="col-md-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-search"></i></span>
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
        @foreach ($artikels as $data)
        <div class="col-xl-4 col-lg-6 col-md-6">
                  <div class="card">
                    <div class="card-header">
                      <div class="d-flex align-items-start">
                        <div class="d-flex align-items-start">
                          <div class="avatar me-2">
                            <img
                              src="{{ asset('store/artikel/thumbnail/' . $data->tumbnail) }}"
                              alt="Avatar"
                            />
                          </div>
                          <div class="me-2 ms-1">
                            <h5 class="mb-0">
                              <a href="javascript:;" class="stretched-link text-body">{{ implode(' ', array_slice(str_word_count($data->name, 1), 0, 4)) }}</a>
                            </h5>
                            <div class="client-info">
                              <strong>Pembuat: </strong><span class="text-muted">{{ $data->psikolog->nama }}</span>
                            </div>
                          </div>
                        </div>
                        <div class="ms-auto">
                          <div class="dropdown zindex-2">
                            <button
                              type="button"
                              class="btn dropdown-toggle hide-arrow p-0"
                              data-bs-toggle="dropdown"
                              aria-expanded="false"
                            >
                              <i class="ti ti-dots-vertical text-muted"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                              <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#viewUser{{ $data->id }}" href="javascript:void(0);">View Artikel</a></li>
                              <li><a class="dropdown-item" href="{{ route('my-artikel.edit', $data->id) }}">Edit Artikel</a></li>
                              <li>
                                <hr class="dropdown-divider" />
                              </li>
                              <li><a class="dropdown-item text-danger" href="javascript:void(0);">Delete Project</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="d-flex align-items-center flex-wrap">
                        <div class="text-start mb-3">
                          <h6 class="mb-1">Tag: 
                             @foreach($data->tagArtikels as $tag)
                             <span class="badge bg-label-info fw-normal me-2">{{ $tag->nama }}</span>
                             @endforeach
                            </h6>
                          <h6 class="mb-1">Category: 
                            @foreach($data->kategoriArtikels as $kategori)
                             <span class="badge bg-label-primary fw-normal me-2">{{ $kategori->nama }}</span>
                             @endforeach
                          </h6>
                        </div>
                      </div>
                      <p class="mb-0">
                       {!! implode(' ', array_slice(str_word_count(strip_tags($data->content), 1), 0, 24)) !!}...
                      </p>
                    </div>
                    <div class="card-body border-top">
                      <div class="d-flex align-items-center mb-3">
                       <h6 class="mb-1">Tanggal Dibuat: <span class="text-body fw-normal">{{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}</span></h6>
                      </div>
                      {{-- <div class="d-flex align-items-center mb-3">
                          <h6 class="mb-1">
                              Publish: 
                              <span class="text-body fw-normal">
                                  @if($data->status === 'accepted')
                                      {{ \Carbon\Carbon::parse($data->updated_at)->translatedFormat('d F Y') }}
                                  @else
                                      -
                                  @endif
                              </span>
                          </h6>
                      </div> --}}
                      <div class="d-flex align-items-center mb-3">
                       <h6 class="mb-1">Status: 
                        @if($data->status === 'accepted')
                           <span class="badge bg-label-success fw-normal me-2">{{ $data->status }}</span>
                        @elseif($data->status === 'pending')
                        <span class="badge bg-label-warning fw-normal me-2">{{ $data->status }}</span>
                         @elseif($data->status === 'rejected')
                         <span class="badge bg-label-danger fw-normal me-2">{{ $data->status }}</span>
                        @endif
                       </h6>
                      </div>
                      <div class="d-flex align-items-center pt-1">
                        <div class="d-flex align-items-center">
                        </div>
                        <div class="ms-auto">
                          <a href="javascript:void(0);" class="text-body"
                            ><i class="ti ti-message-dots ti-sm"></i> 236 Comment</a
                          >
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

   {{-- ============= SHOW DATA =============== --}}
  @foreach ($artikels as $data)
  <div class="modal fade" id="viewUser{{ $data->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2">{{ $data->name }}</h3>
            <p class="text-muted">Informasi tentang  {{ $data->name }}.</p>
          </div>
          <form id="editUserForm" class="row g-3" onsubmit="return false">
            <div class="col-12 text-center">
                <div class="onboarding-media">
                    <img
                      src="{{ asset('store/artikel/thumbnail/' . $data->tumbnail) }}"
                      alt="boy-verify-email-light"
                      width="273"
                      class="img-fluid"
                      data-app-light-img="illustrations/boy-verify-email-light.png"
                      data-app-dark-img="illustrations/boy-verify-email-dark.png"
                    />
                  </div>
            </div>
            <div class="col-12">
              <label class="form-label" for="modalEditUserName">Judul artikel</label>
              <input
                type="text"
                id="modalEditUserName"
                name="modalEditUserName"
                class="form-control"
                placeholder="Masukan judul artikel"
                value="{{ $data->name }}"
              />
            </div>
            <div class="col-12">
              <label class="form-label" for="modalEditUserName">Penulis</label>
              <input
                type="text"
                id="modalEditUserName"
                name="modalEditUserName"
                class="form-control"
                placeholder="Masukan Penulis artikel"
                 value="{{ $data->admin ? $data->admin->nama : ($data->psikolog ? $data->psikolog->nama : '') }}"
              />
            </div>
            <div class="col-12">
              <label class="form-label d-block" for="modalEditUserName">Category Artikel</label>
              @foreach($data->kategoriArtikels as $kategori)
              <span class="badge bg-label-primary">{{ $kategori->nama }}</span>
              @endforeach
            </div>
            <div class="col-12">
              <label class="form-label d-block" for="modalEditUserName">Tag Artikel</label>
              @foreach($data->tagArtikels as $tag)
              <span class="badge bg-label-info">{{ $tag->nama }}</span>
              @endforeach
            </div>
            <div class="col-12">
                <label class="form-label" for="modalEditUserLanguage">Content</label>
                <textarea
                id="basic-icon-default-message"
                class="form-control"
                placeholder="Masukan tempat praktik"
                aria-label="Masukan tempat praktik"
                aria-describedby="basic-icon-default-message2"
                style="height: 240px;"
            >{{ strip_tags($data->content) }}</textarea>
              </div>
            <div class="col-12 text-center">
              <button type="reset" data-bs-dismiss="modal"
              aria-label="Close"
               class="btn btn-primary me-sm-3 me-1">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach

  {{-- ====================== DELETE DATA ======================== --}}
  @foreach ($artikels as $data)
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
      <form method="POST" action="{{ route('bidang-psikolog.destroy', $data->id) }}">
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
