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
            <!-- Statistics -->
            <div class="col-lg-12 mb-4 col-md-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Statistics Konsultasi</h5>
                    {{-- <small class="text-muted">Updated 1 month ago</small> --}}
                  </div>
                  <div class="card-body pt-2">
                    <div class="row gy-3">
                      <div class="col-md-4 col-6">
                        <div class="d-flex align-items-center">
                          <div class="badge rounded-pill bg-label-primary me-3 p-2">
                            <i class="ti ti-news ti-sm"></i>
                          </div>
                          <div class="card-info">
                            <h5 class="mb-0">10</h5>
                            <small>Total Konsultasi</small>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-6">
                        <div class="d-flex align-items-center">
                          <div class="badge rounded-pill bg-label-info me-3 p-2">
                            <i class="ti ti-user-plus ti-sm"></i>
                          </div>
                          <div class="card-info">
                            <h5 class="mb-0">10</h5>
                            <small>Total Konsultasi per Hari</small>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-6">
                        <div class="d-flex align-items-center">
                          <div class="badge rounded-pill bg-label-success me-3 p-2">
                            <i class="ti ti-news ti-sm"></i>
                          </div>
                          <div class="card-info">
                            <h5 class="mb-0 text-success">10

                            </h5>
                            <small>Konsultasi Baru</small>
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
                      <table class="datatables-artikel table">
                        <thead>
                          <tr>
                            <th></th>
                            <th></th>
                            <th>ID</th>
                            <th>Jam</th>
                            <th>Hari</th>
                            <th>Mahasiswa</th>
                            <th>Psikolog</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1; ?>
                          @foreach($allKonsultasi as $data)
                          <tr>
                              <td></td>
                              <td></td>
                              <td>{{ $data->id }}</td>
                              <td>{{ $data->jam }}</td>
                              <td>{{ $data->hari }}</td>
                              <td>{{ $data->mahasiswa->nama }}</td>
                              <td>{{ $data->psikolog->nama }}</td>
                          </tr>
                          @endforeach
                      </tbody>
                      </table>
                    </div>
                  </div>
    </div>
  </div>
  {{-- ============= SHOW DATA =============== --}}
  @foreach ($allKonsultasi as $data)
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
                style="height: 140px;"
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

@endsection
