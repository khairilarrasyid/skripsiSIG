@extends('layouts.admin')

@section('title', $title)

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
        <div class="card-header">
            <h4 class="card-title">Informasi Dasar</h4>
        </div>
        <div class="card-body">
            @if (session('profile'))
                <div class="alert alert-success">
                    <div class="d-flex justify-content-start">
                        <span class="alert-icon m-r-20 font-size-30">
                            <i class="anticon anticon-check-circle"></i>
                        </span>
                        <div>
                            <h5 class="alert-heading">Pemberitahuan</h5>
                            <p>{{ session('profile') }}</p>
                        </div>
                    </div>
                </div>
            @endif

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


            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="font-weight-semibold" for="">Nama Lengkap:</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ $user->name }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label class="font-weight-semibold" for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email"
                            value="{{ $user->email }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <button type="submit" class="btn btn-primary m-t-30">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Ubah Password</h4>
        </div>
        <div class="card-body">

            @if (session('password'))
                <div class="alert alert-success">
                    <div class="d-flex justify-content-start">
                        <span class="alert-icon m-r-20 font-size-30">
                            <i class="anticon anticon-check-circle"></i>
                        </span>
                        <div>
                            <h5 class="alert-heading">Pemberitahuan</h5>
                            <p>{{ session('password') }}</p>
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

            <form action="{{ route('profile.password') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label class="font-weight-semibold" for="">Password Lama:</label>
                        <input type="password" class="form-control" id="password_lama" name="password_lama"
                            placeholder="Old Password" required>
                        @error('password_lama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label class="font-weight-semibold" for="">Password Baru:</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="New Password" required>
                        @error('password_baru')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label class="font-weight-semibold" for="">Confirm Password:</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                            placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group col-md-3">
                        <button class="btn btn-primary m-t-30">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
