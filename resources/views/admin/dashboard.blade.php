@extends('layouts.admin')

@section('title', $title)
@section('content')
    <div class="page-header no-gutters">
        <div class="d-md-flex align-items-md-center justify-content-between">
            <div class="media m-v-10 align-items-center">
                <div class="media-body m-l-15">
                    <h4 class="m-b-0">Selamat Datang, {{ Auth::user()->name }}!</h4>
                    <span class="text-gray">Administrator</span>
                </div>
            </div>
            <div class="d-md-flex align-items-center d-none">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avatar avatar-icon avatar-lg avatar-purple">
                                    <i class="anticon anticon-user"></i>
                                </div>
                                <div class="m-l-15">
                                    <h2 class="m-b-0">{{ $total_pengguna }}</h2>
                                    <p class="m-b-0 text-muted">Pengguna</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avatar avatar-icon avatar-lg avatar-gold">
                                    <i class="anticon anticon-profile"></i>
                                </div>
                                <div class="m-l-15">
                                    <h2 class="m-b-0">{{ $total_destinasi }}</h2>
                                    <p class="m-b-0 text-muted">Destinasi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avatar avatar-icon avatar-lg avatar-blue">
                                    <i class="anticon anticon-picture"></i>
                                </div>
                                <div class="m-l-15">
                                    <h2 class="m-b-0">{{ $total_galeri }}</h2>
                                    <p class="m-b-0 text-muted">Galeri</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avatar avatar-icon avatar-lg avatar-magenta">
                                    <i class="anticon anticon-home"></i>
                                </div>
                                <div class="m-l-15">
                                    <h2 class="m-b-0">{{ $total_penginapan }}</h2>
                                    <p class="m-b-0 text-muted">Penginapan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avatar avatar-icon avatar-lg avatar-geekblue">
                                    <i class="anticon anticon-reconciliation"></i>
                                </div>
                                <div class="m-l-15">
                                    <h2 class="m-b-0">{{ $total_tourguide }}</h2>
                                    <p class="m-b-0 text-muted">Tour Guide</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Destinasi Terbaru</h5>
                        <div>
                            <a href="{{ route('destinations.index') }}" class="btn btn-sm btn-default">Lihat Semua</a>
                        </div>
                    </div>
                    <div class="m-t-30">
                        <ul class="list-group list-group-flush">

                            @foreach ($destinasi_terbaru as $row)
                                <li class="list-group-item p-h-0">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex">
                                            <div class="avatar avatar-image m-r-15">
                                                <img src="{{ Storage::url('destinations/' . $row->image) }}" alt="">
                                            </div>
                                            <div>
                                                <h6 class="m-b-0">
                                                    <a href="javascript:void(0);" class="text-dark"> {{ $row->name }}</a>
                                                </h6>
                                                <span class="text-muted font-size-13">{{ $row->address }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
