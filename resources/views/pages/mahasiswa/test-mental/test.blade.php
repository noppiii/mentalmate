@extends('layouts.admin.main')
@section('title')
    {{$test->name}} || {{ config('app.name') }}
@endsection
@section('pages')
    Tes Kesehatan Mental Mahasiswa
@endsection
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="text-primary">Soal {{$test->name}}</h5>
                                <p>Selamat mencoba mengerjakan {{$data->name}}</p>
                                <button id="viewDataLink" class="btn btn-sm btn-outline-primary">View Data</button>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img
                                    src="{{ asset('image/tes.jpg') }}"
                                    height="150"
                                    alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <!-- User Content -->
                <div class="col-xl-12 col-lg-7 col-md-7 order-0 order-md-1">

                    <!-- Activity Timeline -->
                    <form action="{{route('mahasiswa.test-kesehatan-mental.submitTest', ['idTest' => $test->id, 'nama' => str_replace(' ', '-', $test->name)]) }}" class="card mb-4" enctype="multipart/form-data" method="post">
                        @csrf
                        <h5 class="card-header">Mental Health Test Questions</h5>
                        <div class="card-body pb-0">
                            @if($test->mentalHealthQuestions->isEmpty())
                                <p>No questions available for this test.</p>
                            @else
                                <ul class="timeline mb-0">
                                    @foreach($test->mentalHealthQuestions as $question)
                                        <li class="timeline-item-transparent mb-4">
                                            <div class="timeline-event">
                                                <div class="timeline-header mb-1">
                                                    <h6 class="mb-0">{{ $question->question_text }}</h6>
                                                </div>

                                                @foreach($question->mentalHealthOptions as $option)
                                                    <div class="col-md mb-2">
                                                        <div class="form-check custom-option custom-option-basic">
                                                            <label class="form-check-label custom-option-content"
                                                                   for="option_{{ $option->id }}">
                                                                <input
                                                                    name="question_{{ $question->id }}"
                                                                    class="form-check-input"
                                                                    type="radio"
                                                                    value="{{ $option->value }}"
                                                                    id="option_{{ $option->id }}"
                                                                />
                                                                <span class="custom-option-body">
                                                <small>{{ $option->option_text }}</small>
                                            </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="card-body">
                                <div class="row mt-2">
                                    <div class="d-grid gap-2 col-lg-12 mx-auto">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- /Activity Timeline -->
                </div>
                <!--/ User Content -->
            </div>

            <!-- /Modal -->
        </div>
        <!-- / Content -->
@endsection
