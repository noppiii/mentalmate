@extends('layouts.admin.main')
@section('title')
    Edit Tes Kesehatan Mental | {{ config('app.name') }}
@endsection
@section('pages')
    Edit Tes Kesehatan Mental
@endsection
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">

            <form action="{{ route('test-kesehatan-mental.update', $test->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

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
                                        value="{{ old('name', $test->name) }}"
                                    />
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="bootstrap-maxlength-example2">Deskripsi</label>
                                    <div id="full-editor">{{ old('description', $test->description) }}</div>
                                    <textarea id="description" name="description" style="display:none;">{{ old('description', $test->description) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Repeater for Questions and Options -->
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header">Pertanyaan</h5>
                        <div class="card-body">
                            <div class="form-repeater">
                                <div data-repeater-list="questions">
                                    @foreach($test->questions as $question)
                                        <div data-repeater-item>
                                            <div class="row">
                                                <div class="mb-3 col-lg-6 col-xl-12 col-12 mb-0">
                                                    <label class="form-label" for="form-repeater-pertanyaan-{{ $loop->index }}">Pertanyaan</label>
                                                    <input type="text" id="form-repeater-pertanyaan-{{ $loop->index }}" name="questions[{{ $loop->index }}][question_text]" class="form-control" placeholder="Masukkan pertanyaan" value="{{ old('questions.' . $loop->index . '.question_text', $question->question_text) }}" />
                                                </div>
                                                <div data-repeater-list="options">
                                                    @foreach($question->options as $option)
                                                        <div data-repeater-item>
                                                            <div class="row">
                                                                <div class="mb-3 col-lg-6 col-xl-6 col-12 mb-0">
                                                                    <label class="form-label" for="form-repeater-jawaban-{{ $loop->parent->index }}-{{ $loop->index }}">Jawaban</label>
                                                                    <input type="text" id="form-repeater-jawaban-{{ $loop->parent->index }}-{{ $loop->index }}" name="questions[{{ $loop->parent->index }}][options][{{ $loop->index }}][option_text]" class="form-control" placeholder="Masukkan jawaban" value="{{ old('questions.' . $loop->parent->index . '.options.' . $loop->index . '.option_text', $option->option_text) }}" />
                                                                </div>
                                                                <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                                                    <label class="form-label" for="form-repeater-nilai-{{ $loop->parent->index }}-{{ $loop->index }}">Nilai Jawaban</label>
                                                                    <input type="number" id="form-repeater-nilai-{{ $loop->parent->index }}-{{ $loop->index }}" name="questions[{{ $loop->parent->index }}][options][{{ $loop->index }}][value]" class="form-control" value="{{ old('questions.' . $loop->parent->index . '.options.' . $loop->index . '.value', $option->value) }}" />
                                                                </div>
                                                                <div class="mb-3 col-lg-12 col-xl-4 col-12 d-flex align-items-center mb-0">
                                                                    <button class="btn btn-label-danger mt-4 me-2" data-repeater-delete>
                                                                        <i class="ti ti-x ti-xs me-1"></i>
                                                                        <span class="align-middle">Delete Jawaban</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
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
                                    @endforeach
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
