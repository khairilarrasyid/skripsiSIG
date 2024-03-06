@extends('layouts.front')

@section('title', $title)

@section('content')
    <main id="ts-main">

        <br><br>
        <!--BREADCRUMB
                            =========================================================================================================-->
        <section id="breadcrumb" class="mt-5">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tour Guide</li>
                    </ol>
                </nav>
            </div>
        </section>

        <section id="page-title">
            <div class="container">

                <div class="ts-title">
                    <h2>Data Tour Guide</h2>
                </div>

            </div>
        </section>

        <!--ITEMS AND SIDEBAR
                            =========================================================================================================-->
        <section id="items-grid-and-sidebar">
            <div class="container">
                <div class="row">

                    <!--LEFT SIDE (SIDEBAR)
                                        =============================================================================================-->
                    <div class="col-md-4 navbar-expand-md">

                        <button class="btn bg-white mb-4 w-100 d-block d-md-none" type="button" data-toggle="collapse"
                            data-target="#sidebar" aria-controls="sidebar" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="float-left">
                                <i class="fa fa-search mr-2"></i>
                                Filter Pencarian
                            </span>
                            <span class="float-right">
                                <i class="fa fa-plus small ts-opacity__30"></i>
                            </span>
                        </button>

                        <aside id="sidebar" class="ts-sidebar collapse navbar-collapse">

                            <!--SEARCH FORM
                                                =========================================================================================-->
                            <section id="sidebar-search-form">

                                <h3>Cari Tour Guide</h3>

                                <form id="form-search" class="ts-form" action="{{ route('tour-guide') }}" method="GET">

                                    <!--Keyword-->
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="keyword" name="keyword"
                                            placeholder="Cari Tour Guidemu" value="{{ old('keyword', $keyword) }}">
                                    </div>

                                    <!--Submit button-->
                                    <div class="form-group my-2">
                                        <button type="submit" class="btn btn-primary w-100" id="search-btn">
                                            Cari Sekarang
                                        </button>
                                    </div>

                                </form>
                                <!--end #form-search-->
                            </section>

                        </aside>
                        <!--end #sidebar-->
                    </div>
                    <!--end Right Side / col-md-4-->

                    <!--RIGHT SIDE (ITEMS)
                                        =============================================================================================-->
                    <div class="col-md-8">

                        <!--AGENCIES
                        =================================================================================================-->
                        <section id="agencies">

                            @foreach ($tourGuides as $row)
                                <!--Agency-->
                                <div class="card ts-item ts-item__list ts-item__company ts-card">

                                    <!--Card Image-->
                                    <a href="{{ route('tour-guide.detail', $row->id) }}" class="card-img">
                                        <img src="{{ Storage::url('tour-guide/'.$row->foto) }}" alt="" style="width: 100%; overflow: hidden; height: 100%;">
                                    </a>

                                    <!--Card Body-->
                                    <div class="card-body">

                                        <figure class="ts-item__info">
                                            <h4>{{ $row->name }}</h4>
                                            <aside>
                                                <i class="fa fa-map-marker mr-2"></i>
                                                <span>{{ $row->address }}</span>
                                            </aside>
                                        </figure>

                                        <div class="ts-company-info">

                                            <div class="ts-company-contact mb-2 mb-sm-0">
                                                <div>
                                                    <i class="fa fa-phone"></i>
                                                    <span>{{ $row->phone }}</span>
                                                </div>

                                                <div>
                                                    <i class="fa fa-envelope"></i>
                                                    <a href="#">{{ $row->email }}</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!--Card Footer-->
                                    <div class="card-footer">
                                        <a href="{{ route('tour-guide.detail', $row->id) }}" class="ts-btn-arrow">Detail</a>
                                    </div>

                                </div>
                                <!--end agency-->
                            @endforeach

                        </section>
                        <!--end #agencies-->

                        <!--PAGINATION
                                            =========================================================================================-->
                        <section id="pagination">
                            <div class="container">

                                <!--Pagination-->
                                <nav aria-label="Page navigation">
                                    <ul class="pagination ts-center__horizontal">
                                        @for ($page = 1; $page <= $tourGuides->lastPage(); $page++)
                                            <li class="page-item {{ $page === $tourGuides->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $tourGuides->url($page) }}">{{ $page }}</a>
                                            </li>
                                        @endfor
                                        @if ($tourGuides->currentPage() < $tourGuides->lastPage())
                                            <li class="page-item">
                                                <a class="page-link ts-btn-arrow" href="{{ $tourGuides->nextPageUrl() }}">Next</a>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>


                            </div>
                        </section>

                    </div>
                    <!--end Right Side / col-md-8-->

                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        <!--end #items-list-->

    </main>
@endsection
