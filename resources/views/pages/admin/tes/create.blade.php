@extends('layouts.admin.main')
@section('title')
    Buat Tes Kesehatan Mental | {{ config('app.name') }}
@endsection
@section('pages')
    Buat Tes Kesehatan Mental
@endsection
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">

            <form action="{{ route('test-kesehatan-mental.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Bootstrap Maxlength -->
                <div class="col-12">
                    <div class="card mb-4">
                        <h5 class="card-header">Test</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <label class="form-label" for="bootstrap-maxlength-example1">Nama Tes</label>
                                    <input
                                        type="text"
                                        id="bootstrap-maxlength-example1"
                                        class="form-control bootstrap-maxlength-example"
                                        maxlength="25"
                                        name="name"
                                    />
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="bootstrap-maxlength-example2">Deskripsi</label>
                                    <div id="full-editor"></div>
                                    <textarea id="description" name="description" style="display:none;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Repeater -->
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header">Pertanyaan</h5>
                        <div class="card-body">
                            <div class="form-repeater">
                                <div data-repeater-list="questions">
                                    <div data-repeater-item>
                                        <div class="row">
                                            <div class="mb-3 col-lg-6 col-xl-12 col-12 mb-0">
                                                <label class="form-label" for="form-repeater-pertanyaan-1">Pertanyaan</label>
                                                <input type="text" id="form-repeater-pertanyaan-1" name="questions[][question_text]" class="form-control" placeholder="Masukkan pertanyaan" />
                                            </div>
                                            <div data-repeater-list="options">
                                                <div data-repeater-item>
                                                    <div class="row">
                                                        <div class="mb-3 col-lg-6 col-xl-6 col-12 mb-0">
                                                            <label class="form-label" for="form-repeater-jawaban-1-1">Jawaban</label>
                                                            <input type="text" id="form-repeater-jawaban-1-1" name="questions[][options][][option_text]" class="form-control" placeholder="Masukkan jawaban" />
                                                        </div>
                                                        <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                                            <label class="form-label" for="form-repeater-nilai-1-1">Nilai Jawaban</label>
                                                            <input type="number" id="form-repeater-nilai-1-1" name="questions[][options][][value]" class="form-control" />
                                                        </div>
                                                        <div class="mb-3 col-lg-12 col-xl-4 col-12 d-flex align-items-center mb-0">
                                                            <button class="btn btn-label-danger mt-4 me-2" data-repeater-delete>
                                                                <i class="ti ti-x ti-xs me-1"></i>
                                                                <span class="align-middle">Delete Jawaban</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-lg-12 col-xl-12 col-12 d-flex align-items-center mb-0">
                                                <button class="btn btn-label-primary mt-4" data-repeater-create>
                                                    <i class="ti ti-plus me-1"></i>
                                                    <span class="align-middle">Add Jawaban</span>
                                                </button>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="mb-4">
                                            <button class="btn btn-label-danger me-2" data-repeater-delete>
                                                <i class="ti ti-x ti-xs me-2"></i>
                                                <span class="align-middle">Delete Pertanyaan</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-0">
                                    <button class="btn btn-primary" data-repeater-create>
                                        <i class="ti ti-plus me-1"></i>
                                        <span class="align-middle">Add Pertanyaan</span>
                                    </button>
                                </div>

                                <div class="mt-4">
                                    <div class="row">
                                        <button type="submit" class="btn btn-success">
                                            <i class="ti ti-save me-1"></i>
                                            <span class="align-middle">Submit</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
    <!-- / Content -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var quill = new Quill('#full-editor', {
                theme: 'snow'
            });

            var form = document.querySelector('form'); // Adjust the form selector as needed
            form.onsubmit = function () {
                // Update the hidden textarea before submitting the form
                var description = document.querySelector('#description');
                description.value = quill.root.innerHTML;
            };
        });
    </script>
@endsection
