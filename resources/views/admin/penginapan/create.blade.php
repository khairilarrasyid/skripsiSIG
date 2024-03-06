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

            var mapOptions = {
                center: [-1.88333, 115.5],
                zoom: 10
            }

            var map = new L.map('map', mapOptions);
            var layer = new L.TileLayer('https://mt1.google.com/vt/lyrs=r&x={x}&y={y}&z={z}', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            });

            map.addLayer(layer);

            var marker;

            const form = $('#create-form');
            let lati = form.find('input[name="latitude"]');
            let long = form.find('input[name="longitude"]');
            let imageUpload = form.find('input[name="foto"]');

            $('#latitude, #longitude').on('keyup', function() {
                if (lati.val() != '' && long.val() != '') {
                    // Ambil nilai latitude dan longitude
                    let lat = parseFloat(lati.val());
                    let lng = parseFloat(long.val());

                    if (marker) {
                        map.removeLayer(marker);
                    }

                    marker = L.marker([lat, lng]).addTo(map);
                    map.setView([lat, lng], 15);
                }
            });

            map.on('click', function(ev) {
                let lat = ev.latlng.lat;
                let lng = ev.latlng.lng;
                lati.val(lat);
                long.val(lng);

                if (marker) {
                    map.removeLayer(marker);
                }

                marker = L.marker([lat, lng], {
                    riseOnHover: true,
                    draggable: true
                }).addTo(map);

                marker.on('drag', function(ev) {
                    let newLat = ev.latlng.lat;
                    let newLng = ev.latlng.lng;
                    lati.val(newLat);
                    long.val(newLng);
                });
            });

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
    <form id="create-form" action="{{ route('penginapan.store') }}" method="POST" enctype="multipart/form-data">
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
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*"
                                required>
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
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#product-edit-basic">Informasi Dasar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#product-edit-description">Deskripsi</a>
                </li>
            </ul>
        </div>
        <div class="tab-content m-t-15">
            <div class="tab-pane fade show active" id="product-edit-basic">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="font-weight-semibold" for="nama">Nama Penginapan</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" value="{{ old('nama') }}" required>
                            <input type="hidden" name="kategori" id="kategori" value="1"> 
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label class="font-weight-semibold" for="jam_operasional">Jam Operasional</label>
                                <div class="d-flex align-items-center">
                                    <input type="time" class="form-control" name="start" placeholder="From">
                                    <span class="p-h-10">sampai</span>
                                    <input type="time" class="form-control" name="end" placeholder="To">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold" for="harga_tiket">Harga Tiket</label>
                            <input type="number" class="form-control" id="harga_tiket" name="harga_tiket"
                                value="{{ old('harga_tiket') }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold" for="alamat">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                                value="{{ old('alamat') }}" required>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold" for="latitude">Latitude</label>
                            <input type="number" class="form-control @error('latitude') is-invalid @enderror" id="latitude" name="latitude"
                                value="{{ old('latitude') }}" required step="any">
                            @error('latitude')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold" for="longitude">Longitude</label>
                            <input type="number" class="form-control @error('longitude') is-invalid @enderror" id="longitude" name="longitude"
                                value="{{ old('longitude') }}" required step="any">
                            @error('longitude')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold" for="deskripsi">Deskripsi</label>
                            <div id = "map" style = "width: 550px; height: 450px"></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="product-edit-description">
                <div class="card">
                    <div class="card-body">
                        <div id="deskripsi">
                            {!! old('deskripsi') !!}
                        </div>
                        <input type="hidden" id="quill_html" name="deskripsi">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
