@extends('layouts.admin')

@section('title', $title)

@section('page_css')
    <link href="{{ asset('assets_be/vendors/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('page_js')
    <script src="{{ asset('assets_be/vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets_be/vendors/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets_be/js/pages/datatables.js') }}"></script>
    <script>
        $(document).on('click', '.edit-form-modal', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            var url = "{{ route('categories.edit', ':id') }}";
            var urlForm = "{{ route('categories.update', ':id') }}";

            url = url.replace(':id', id);
            urlForm = urlForm.replace(':id', id);

            $.ajax({
                url: url,
                method: 'GET',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#edit-form').attr('action', urlForm);
                    $('#edit-form input[name="name"]').val(response.name);
                }
            });
        });

        $(document).on('click', '.delete-form-modal', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            var url = "{{ route('categories.destroy', ':id') }}";
            url = url.replace(':id', id);
            $('#delete-form').attr('action', url);
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
            <button class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#create-new-project">
                <i class="anticon anticon-plus"></i>
                <span class="m-l-5">Tambah Data</span>
            </button>
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
                            <th>Kategori</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($categories as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->name }}</td>
                                <td class="text-right">
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right edit-form-modal" data-toggle="modal"
                                        data-target="#edit-form-modal" id="{{ $row->id }}">
                                        <i class="anticon anticon-edit"></i>
                                    </button>
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded delete-form-modal" data-toggle="modal"
                                    data-target="#delete-form-modal" id="{{ $row->id }}">
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
    @include('admin.category._create')
    @include('admin.category._edit')
    @include('admin.category._delete')
@overwrite
