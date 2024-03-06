@extends('layouts.admin')

@section('title', $title)

@section('page_css')
    <link href="{{ asset('assets_be/vendors/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_be/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
@endsection

@section('page_js')
    <script src="{{ asset('assets_be/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets_be/vendors/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets_be/js/pages/e-commerce-product-edit.js') }}"></script>
    <script src="{{ asset('assets_be/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        $('.datepicker-input').datepicker();

        $(document).ready(function() {

            var quill = new Quill('#deskripsi', {
                theme: 'snow'
            });
            quill.on('text-change', function(delta, oldDelta, source) {
                document.getElementById("quill_html").value = quill.root.innerHTML;
            });

            const form = $('#create-form');
            let imageUpload = form.find('input[name="foto"]');

            imageUpload.on('change', function(e) {
                var file = e.target.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    var imageSrc = e.target.result;

                    $('#imagePreview').html('<img src="' + imageSrc +
                        '" alt="Preview" style="width: 100%; height: 70px;">');
                };

                reader.readAsDataURL(file);
            });


        });
    </script>
@endsection

@section('content')
    <form id="create-form" action="{{ route('tour-guides.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="page-header no-gutters has-tab">

            @if (session('error'))
                <div class="alert alert-danger">
                    <div class="d-flex justify-content-start">
                        <span class="alert-icon m-r-20 font-size-30">
                            <i class="anticon anticon-close-circle"></i>
                        </span>
                        <div>
                            <h5 class="alert-heading">Pemberitahuan</h5>
                            <p>{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="d-md-flex m-b-15 align-items-center justify-content-between">
                <div class="media align-items-center m-b-15">
                    <div class="avatar avatar-image rounded" style="height: 70px; width: 100px">
                        <div id="imagePreview"></div>
                    </div>
                    <div class="m-l-15">
                        <div class="form-group">
                            <label class="font-weight-semibold" for="foto">Upload Foto</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto"
                                name="foto" accept="image/*" required>
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="m-b-15">
                    <button type="submit" class="btn btn-primary">
                        <i class="anticon anticon-save"></i>
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="m-t-15">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-semibold" for="nama">Nama Tour Guide</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" value="{{ old('nama') }}" required>
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-semibold" for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-semibold" for="phone">No Telepon</label>
                        <input type="number" class="form-control" id="phone" name="phone"
                            value="{{ old('phone') }}" required>
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-semibold" for="alamat">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                            name="alamat" value="{{ old('alamat') }}" required>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-semibold" for="deskripsi">Deskripsi</label>
                        <div id="deskripsi">
                            {!! old('deskripsi') !!}
                        </div>
                        <input type="hidden" id="quill_html" name="deskripsi">
                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection
