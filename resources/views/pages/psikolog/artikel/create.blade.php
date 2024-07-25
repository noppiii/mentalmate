@extends('layouts.admin.main')
@section('title')
    Admin || Admin
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
                    <h5 class="text-primary">Tambah Artikel</h5>
                    <p>Di sini anda dapat menambahkan artikel</p>
                    <button id="viewDataLink" class="btn btn-sm btn-outline-primary">View Form</button>
                  </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                  <div class="card-body pb-0 px-0 px-md-4">
                    <img
                      src="{{ asset('image/add-admin.jpg') }}"
                      height="150"
                      alt="View Badge User"
                      data-app-dark-img="illustrations/man-with-laptop-dark.png"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
         <!-- Multi Column with Form Separator -->
         <div class="card mb-4">
            <form class="card-body" action="{{ route('my-artikel.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="row mb-3 mt-4">
                        <label class="col-sm-2 form-label" for="basic-icon-default-email">Judul Artikel</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="ti ti-signature"></i></span>
                                <input
                                    type="text"
                                    id="basic-icon-default-email"
                                    class="form-control"
                                    placeholder="Masukan judul artikel"
                                    aria-describedby="basic-icon-default-email2"
                                    name="name"
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="row mb-3 mt-4">
                        <label class="col-sm-2 form-label" for="basic-icon-default-email">Thumbnail Artikel</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="file" name="tumbnail" class="form-control" id="inputGroupFile02" />
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="row mb-3 mt-4">
                        <label class="col-sm-2 form-label" for="basic-icon-default-email">Category Artikel</label>
                        <div class="col-sm-10">
                            <div class="select2-primary">
                                <select id="select2Primary" class="select2 form-select" name="kategori_artikel[]" multiple>
                                    @foreach ($allCategory as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="row mb-3 mt-4">
                        <label class="col-sm-2 form-label" for="basic-icon-default-email">Tag Artikel</label>
                        <div class="col-sm-10">
                            <div class="select2-info">
                                <select id="select2Info" class="select2 form-select" name="tag_artikel[]" multiple>
                                    @foreach ($allTag as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="row mb-3 mt-4">
                        <label class="col-sm-2 form-label" for="basic-icon-default-email">Content Artikel</label>
                        <div class="col-sm-10">
                            <div id="full-editor"></div>
                            <textarea id="content" name="content" style="display:none;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="pt-4">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                    <button type="reset" class="btn btn-label-secondary">Cancel</button>
                </div>
            </form>
          </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        var quill = new Quill('#full-editor', {
            theme: 'snow'
        });

        var form = document.querySelector('form'); // Adjust the form selector as needed
        form.onsubmit = function () {
            // Update the hidden textarea before submitting the form
            var content = document.querySelector('#content');
            content.value = quill.root.innerHTML;
        };
    });
</script>
@endsection
