@extends('layouts.admin')

@section('title', $title)

@section('page_css')
    <link href="{{ asset('assets_be/vendors/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
@endsection

@section('page_js')
    <script src="{{ asset('assets_be/vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets_be/vendors/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets_be/js/pages/datatables.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        $(document).ready(function() {
            $('.show-modal').on('click', function() {
                var id = $(this).data('id');
                var lati = $(this).data('latitude');
                var long = $(this).data('longitude');

                var url = "{{ route('destinations.show', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#maps-section').html('');
                        $('#maps-section').html(
                            '<div id="maps-detail" style = "width: 50%; height: 450px"></div>'
                        );
                        loadMap(lati, long);
                        $('.content-detail').html(response);
                    }
                });
            })

            function loadMap(latitude, longitude) {
                var mapOptions = {
                    center: [latitude, longitude],
                    zoom: 10
                };
                var map = new L.map('maps-detail', mapOptions);
                var layer = new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                });
                map.addLayer(layer);

                var marker = L.marker([latitude, longitude]).addTo(map);
            }

            $('.gallery-modal').on('click', function() {
                var id = $(this).data('id');
                $('#destination_id').val(id);

                var url = "{{ route('destinations.galeri', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('.gallery-modal-detail').html(response);
                    }
                });
            })

            $(document).on('click', '.delete-form-modal', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                var url = "{{ route('destinations.destroy', ':id') }}";
                url = url.replace(':id', id);
                $('#delete-form').attr('action', url);
            });

        });
    </script>
@endsection

@section('content')
    <div class="page-header">
        <h2 class="header-title">{{ $title }}</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Dashboard</a>
                <span class="breadcrumb-item active">{{ $title }}</span>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4>Data {{ $title }}</h4>
            <a href="{{ route('penginapan.create') }}" class="btn btn-primary mt-2 mb-2">
                <i class="anticon anticon-plus"></i>
                <span class="m-l-5">Tambah Data</span>
            </a>
            @if ($errors->any())
                <div class="alert alert-warning">
                    <div class="d-flex justify-content-start">
                        <span class="alert-icon m-r-20 font-size-30">
                            <i class="anticon anticon-exclamation-circle"></i>
                        </span>
                        <div>
                            <h5 class="alert-heading">Pemberitahuan</h5>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif


            @if (session('success'))
                <div class="alert alert-success">
                    <div class="d-flex justify-content-start">
                        <span class="alert-icon m-r-20 font-size-30">
                            <i class="anticon anticon-check-circle"></i>
                        </span>
                        <div>
                            <h5 class="alert-heading">Pemberitahuan</h5>
                            <p>{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif


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
            <div class="m-t-25">
                <table id="data-table" class="table">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Nama Penginapan</th>
                            <th>Kategori</th>
                            <th>Koordinat</th>
                            <th>Jam Operasional</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($destinations as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    {{ $row->name }}
                                </td>
                                <td>{{ $row->category->name }}</td>
                                <td>
                                    {{ $row->latitude }}, {{ $row->longitude }}
                                </td>
                                <td>{{ $row->opening_hours }}</td>
                                <td class="text-right">
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right gallery-modal"
                                        data-toggle="modal" data-target="#gallery-modal" data-id="{{ $row->id }}">
                                        <i class="anticon anticon-picture"></i>
                                    </button>
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right show-modal"
                                        data-toggle="modal" data-target="#show-modal" data-id="{{ $row->id }}"
                                        data-latitude="{{ $row->latitude }}" data-longitude="{{ $row->longitude }}">
                                        <i class="anticon anticon-eye"></i>
                                    </button>
                                    <a href="{{ route('penginapan.edit', $row->id) }}"
                                        class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                        <i class="anticon anticon-edit"></i>
                                    </a>
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded delete-form-modal"
                                        data-toggle="modal" data-target="#delete-form-modal" id="{{ $row->id }}">
                                        <i class="anticon anticon-delete"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    @include('admin.destinations._show')
    @include('admin.destinations._gallery')
    @include('admin.destinations._delete')
@endsection
