@extends('layouts.admin.main')
@section('title')
    Edit Kategori Artikel | {{ config('app.name') }}
@endsection
@section('pages')
    Edit Kategori Artikel Admin
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
              <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                  <div class="card-body">
                    <h5 class="text-primary">Edit Kategori Artikel</h5>
                    <p>Di sini anda dapat mengubah kategori artikel</p>
                    <button id="viewDataLink" class="btn btn-sm btn-outline-primary">View Form</button>
                  </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                  <div class="card-body pb-0 px-0 px-md-4">
                    <img
                      src="{{ asset('image/category-artikel.jpg') }}"
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
             <form class="card-body" action="{{ route('kategori-artikel.update', $category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="row g-3">
                <div class="row mb-3 mt-4">
                    <label class="col-sm-2 form-label" for="basic-icon-default-email">Nama</label>
                    <div class="col-sm-10">
                      <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ti ti-signature"></i></span>
                        <input
                          type="text"
                          id="basic-icon-default-email"
                          class="form-control"
                          placeholder="Masukan nama kategori"
                          aria-describedby="basic-icon-default-email2"
                          name="nama"
                          value="{{ $category->nama }}"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 form-label" for="multicol-password">Deskripsi</label>
                    <div class="col-sm-10">
                        <div id="full-editor">{!! $category->content !!}</div>
                        <textarea id="content" name="content" style="display:none;">{{ $category->content }}</textarea>
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

        // Set the initial content of the editor
        quill.root.innerHTML = document.querySelector('#content').value;

        var form = document.querySelector('form'); // Adjust the form selector as needed
        form.onsubmit = function () {
            // Update the hidden textarea before submitting the form
            var content = document.querySelector('#content');
            content.value = quill.root.innerHTML;
        };
    });
</script>
@endsection
