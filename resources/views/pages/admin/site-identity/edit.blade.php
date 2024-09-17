@extends('layouts.admin.main')
@section('title')
    Edit Site Identity | {{ config('app.name') }}
@endsection
@section('pages')
    Edit Site Identity Admin
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="text-primary">Edit Site Identity</h5>
                                <p>Di sini anda dapat mengubah site identity</p>
                                <button id="viewDataLink" class="btn btn-sm btn-outline-primary">View Form</button>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img
                                    src="{{ asset('image/site-identity.jpg') }}"
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
                <form class="card-body" action="{{ route('site-identity.update', $siteIdentity->id) }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row g-3">
                        <div class="row mb-3 mt-4">
                            <label class="col-sm-2 form-label" for="basic-icon-default-email">Nama Website</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-signature"></i></span>
                                    <input
                                        type="text"
                                        id="basic-icon-default-email"
                                        class="form-control"
                                        placeholder="Masukan judul artikel"
                                        aria-describedby="basic-icon-default-email2"
                                        name="name_website"
                                        value="{{$siteIdentity->name_website}}"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="row mb-3 mt-4">
                            <label class="col-sm-2 form-label" for="basic-icon-default-email">Email</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-mail"></i></span>
                                    <input
                                        type="text"
                                        id="basic-icon-default-email"
                                        class="form-control"
                                        placeholder="Masukan judul Banner"
                                        aria-describedby="basic-icon-default-email2"
                                        name="email"
                                        value="{{$siteIdentity->email}}"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="row mb-3 mt-4">
                            <label class="col-sm-2 form-label" for="basic-icon-default-email">Contact</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-phone-call"></i></span>
                                    <input
                                        type="text"
                                        id="basic-icon-default-email"
                                        class="form-control"
                                        placeholder="Masukan judul Banner"
                                        aria-describedby="basic-icon-default-email2"
                                        name="contact"
                                        value="{{$siteIdentity->contact}}"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="row mb-3 mt-4">
                            <label class="col-sm-2 form-label" for="basic-icon-default-email">Alamat</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-map-pin"></i></span>
                                    <input
                                        type="text"
                                        id="basic-icon-default-email"
                                        class="form-control"
                                        placeholder="Masukan judul Banner"
                                        aria-describedby="basic-icon-default-email2"
                                        name="address"
                                        value="{{$siteIdentity->address}}"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="row mb-3 mt-4">
                            <label class="col-sm-2 form-label" for="basic-icon-default-email">Link Instagram</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-brand-instagram"></i></span>
                                    <input
                                        type="text"
                                        id="basic-icon-default-email"
                                        class="form-control"
                                        placeholder="Masukan judul Banner"
                                        aria-describedby="basic-icon-default-email2"
                                        name="social_instagram"
                                        value="{{$siteIdentity->social_instagram}}"
                                    />
                                </div>
                                <div class="form-text">Optional</div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="row mb-3 mt-4">
                            <label class="col-sm-2 form-label" for="basic-icon-default-email">Link Facebook</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-brand-facebook"></i></span>
                                    <input
                                        type="text"
                                        id="basic-icon-default-email"
                                        class="form-control"
                                        placeholder="Masukan judul Banner"
                                        aria-describedby="basic-icon-default-email2"
                                        name="social_facebook"
                                        value="{{$siteIdentity->social_facebook}}"
                                    />
                                </div>
                                <div class="form-text">Optional</div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="row mb-3 mt-4">
                            <label class="col-sm-2 form-label" for="basic-icon-default-email">Link LinkedIn</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-brand-linkedin"></i></span>
                                    <input
                                        type="text"
                                        id="basic-icon-default-email"
                                        class="form-control"
                                        placeholder="Masukan judul Banner"
                                        aria-describedby="basic-icon-default-email2"
                                        name="social_linkedin"
                                        value="{{$siteIdentity->social_linkedin}}"
                                    />
                                </div>
                                <div class="form-text">Optional</div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="row mb-3 mt-4">
                            <label class="col-sm-2 form-label" for="basic-icon-default-email">Link X/ Twitter</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-brand-twitter"></i></span>
                                    <input
                                        type="text"
                                        id="basic-icon-default-email"
                                        class="form-control"
                                        placeholder="Masukan judul Banner"
                                        aria-describedby="basic-icon-default-email2"
                                        name="social_x"
                                        value="{{$siteIdentity->social_x}}"
                                    />
                                </div>
                                <div class="form-text">Optional</div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="row mb-3 mt-4">
                            <label class="col-sm-2 form-label" for="basic-icon-default-email">Logo</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="file" name="logo" class="form-control" id="inputGroupFile02"/>
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                </div>
                                <div class="form-text">Upload ulang jika ingin mengubah banner
                                </div>
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

            var form = document.querySelector('form');
            form.onsubmit = function () {
                var content = document.querySelector('#content');
                content.value = quill.root.innerHTML;
            };
        });
    </script>
@endsection
