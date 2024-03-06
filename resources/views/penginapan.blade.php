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
                        <li class="breadcrumb-item active" aria-current="page">Penginapan</li>
                    </ol>
                </nav>
            </div>
        </section>

        <section id="page-title">
            <div class="container">

                <div class="ts-title">
                    <h2>Data Seluruh Penginapan</h2>
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

                                <h3>Cari Penginapan</h3>

                                <form id="form-search" class="ts-form" action="{{ route('penginapan') }}" method="GET">

                                    <!--Keyword-->
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="keyword" name="keyword"
                                            placeholder="Cari Penginapan disini" value="{{ old('keyword', $keyword) }}">
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

                        <!--ITEMS LIST
                                        =========================================================================================-->
                        <section id="ts-items-list">

                            @foreach ($penginapans as $penginapan)
                                <!--Item-->
                                <div class="card ts-item ts-item__list ts-card">

                                    <!--Card Image-->
                                    <a href="{{ route('penginapan.detail', $penginapan->id) }}" class="card-img"
                                        data-bg-image="{{ Storage::url('destinations/' . $penginapan->image) }}"></a>

                                    <!--Card Body-->
                                    <div class="card-body">

                                        <figure class="ts-item__info">
                                            <h4>{{ $penginapan->name }}</h4>
                                            <aside>
                                                <i class="fa fa-map-marker mr-2"></i>
                                                {{ $penginapan->address }}
                                            </aside>
                                        </figure>

                                        <div class="ts-item__info-badge">
                                            @if ($penginapan->ticket_price == 0)
                                                Tidak Diketahui
                                            @else
                                                {{ 'Rp. ' . number_format($penginapan->ticket_price, 0, ',', '.') }}
                                            @endif
                                        </div>

                                        <div class="ts-description-lists">
                                            <dl>
                                                <dt>Jam Operasional</dt>
                                                <dd>{{ $penginapan->opening_hours }}</dd>
                                            </dl>
                                            <dl>
                                                <dt>Kategori</dt>
                                                <dd>{{ $penginapan->category->name }}</dd>
                                            </dl>
                                        </div>
                                    </div>

                                    <!--Card Footer-->
                                    <a href="{{ route('penginapan.detail', $penginapan->id) }}" class="card-footer">
                                        <span class="ts-btn-arrow">Detail</span>
                                    </a>

                                </div>
                            @endforeach

                        </section>
                        <!--end row-->

                        <!--PAGINATION
                                        =========================================================================================-->
                        <section id="pagination">
                            <div class="container">

                                <!--Pagination-->
                                <nav aria-label="Page navigation">
                                    <ul class="pagination ts-center__horizontal">
                                        @for ($page = 1; $page <= $penginapans->lastPage(); $page++)
                                            <li class="page-item {{ $page === $penginapans->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $penginapans->url($page) }}">{{ $page }}</a>
                                            </li>
                                        @endfor
                                        @if ($penginapans->currentPage() < $penginapans->lastPage())
                                            <li class="page-item">
                                                <a class="page-link ts-btn-arrow" href="{{ $penginapans->nextPageUrl() }}">Next</a>
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
