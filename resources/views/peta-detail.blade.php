@extends('layouts.front')

@section('title', $title)

@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets_fe/css/leaflet.css') }}">
@endsection

@section('page_js')
    <script src="{{ asset('assets_fe/js/dragscroll.js') }}"></script>
    <script src="{{ asset('assets_fe/js/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets_fe/js/leaflet.js') }}"></script>
    <script src="{{ asset('assets_fe/js/leaflet.markercluster.js') }}"></script>
    <script src="{{ asset('assets_fe/js/map-leaflet.js') }}"></script>
@endsection

@section('content')
    <main id="ts-main">
        <br>
        <br>

        <!--BREADCRUMB
                                        =========================================================================================================-->
        <section id="breadcrumb" class="mt-5">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Detail</a></li>
                    </ol>
                </nav>
            </div>
        </section>

        <!--GALLERY CAROUSEL
                                            =========================================================================================================-->
        <section id="gallery-carousel" class="">

            <div class="owl-carousel ts-gallery-carousel ts-gallery-carousel__multi" data-owl-dots="1" data-owl-items="3"
                data-owl-center="1" data-owl-loop="1">

                <!--Slide-->
                <div class="slide">
                    <div class="ts-image" data-bg-image="{{ Storage::url('destinations/' . $destination->image) }}">
                        <a href="{{ Storage::url('destinations/' . $destination->image) }}" class="ts-zoom popup-image"><i
                                class="fa fa-search-plus"></i>Zoom</a>
                    </div>
                </div>

                @foreach ($destination->galleries as $foto)
                    <div class="slide">
                        <div class="ts-image" data-bg-image="{{ Storage::url('gallery/' . $foto->image) }}">
                            <a href="{{ Storage::url('gallery/' . $foto->image) }}" class="ts-zoom popup-image"><i
                                    class="fa fa-search-plus"></i>Zoom</a>
                        </div>
                    </div>
                @endforeach

            </div>

        </section>

        <!--PAGE TITLE
                                    =========================================================================================================-->
        <section id="page-title" class="border-bottom ts-white-gradient">
            <div class="container">

                <div class="d-block d-sm-flex justify-content-between">

                    <!--Title-->
                    <div class="ts-title mb-0">
                        <h2>{{ $destination->name }}</h2>
                        <h5 class="ts-opacity__90">
                            <i class="fa fa-map-marker text-primary"></i>
                            {{ $destination->address }}
                        </h5>
                    </div>

                    <!--Price-->
                    {{-- <h3>
                        <span class="badge badge-primary p-3 font-weight-normal ts-shadow__sm">$350,000</span>
                    </h3> --}}

                </div>

            </div>
        </section>

        <!--CONTENT
                                =========================================================================================================-->
        <section id="content">
            <div class="container">
                <div class="row flex-wrap-reverse">

                    <!--LEFT SIDE
                                                =============================================================================================-->
                    <div class="col-md-5 col-lg-4">

                        <!--DETAILS
                                                    =========================================================================================-->
                        <section id="location">

                            <h3>Lokasi</h3>

                            <div class="ts-box p-0">
                                <div class="ts-map ts-map__detail" id="ts-map-simple"
                                    data-ts-map-leaflet-provider="https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}{r}.png"
                                    data-ts-map-zoom="12" data-ts-map-center-latitude="{{ $destination->latitude }}"
                                    data-ts-map-center-longitude="{{ $destination->longitude }}"
                                    data-ts-map-scroll-wheel="1" data-ts-map-controls="0"></div>

                                <div class="p-3 ts-text-color-light text-center">
                                    <a href='https://www.google.com/maps/dir/?api=1&destination={{ $destination->latitude }},{{ $destination->longitude }}'
                                        target="_blank">
                                        <i class="fa fa-map-marker-alt mr-2"></i>
                                        <span>Lihat Rute Dari Lokasi Sekarang</span>
                                    </a>
                                </div>
                            </div>

                        </section>

                        <!--ACTIONS
                                                =============================================================================================-->
                        {{-- <section id="actions">
    
                                <div class="d-flex justify-content-between">
    
                                    <a href="#" class="btn btn-light mr-2 w-100" data-toggle="tooltip" data-placement="top" title="Add to favorites">
                                        <i class="far fa-star"></i>
                                    </a>
    
                                    <a href="#" class="btn btn-light mr-2 w-100" data-toggle="tooltip" data-placement="top" title="Print">
                                        <i class="fa fa-print"></i>
                                    </a>
    
                                    <a href="#" class="btn btn-light mr-2 w-100" data-toggle="tooltip" data-placement="top" title="Add to compare">
                                        <i class="fa fa-exchange-alt"></i>
                                    </a>
    
                                    <a href="#" class="btn btn-light w-100" data-toggle="tooltip" data-placement="top" title="Share property">
                                        <i class="fa fa-share-alt"></i>
                                    </a>
    
                                </div>
    
                            </section>
     --}}
                    </div>
                    <!--end col-md-4-->

                    <!--RIGHT SIDE
                                                =============================================================================================-->
                    <div class="col-md-7 col-lg-8">

                        <!--DESCRIPTION
                                                    =========================================================================================-->
                        <section id="description">

                            <h3>Deskripsi</h3>

                            <p>
                                {!! $destination->description !!}
                            </p>

                            <dl class="ts-description-list__line mb-0">

                                <dt>Kategori:</dt>
                                <dd class="border-bottom pb-2">{{ $destination->category->name }}</dd>

                                <dt>Harga Tiket Masuk:</dt>
                                <dd class="border-bottom pb-2">
                                    @if ($destination->ticket_price == 0)
                                        Tidak Diketahui
                                    @else
                                        {{ 'Rp. ' . number_format($destination->ticket_price, 0, ',', '.') }}
                                    @endif

                                </dd>

                                <dt>Jam Operasional:</dt>
                                <dd class="border-bottom pb-2">{{ $destination->opening_hours }} </dd>

                            </dl>

                        </section>
                    </div>
                    <!--end col-md-8-->

                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>

        <!--SIMILAR PROPERTIES
                                =============================================================================================================-->
        <section id="similar-properties">
            <div class="container">
                <div class="row">

                    <div class="offset-lg-4 col-sm-12 col-lg-8">

                        <hr class="mb-5">

                        <h3>Destinasi Lainnya</h3>

                        @foreach ($lainnya as $row)
                            <!--Item-->
                            <div class="card ts-item ts-item__list ts-card">
                                <!--Card Image-->
                                <a href="{{ route('peta.detail', $row->id) }}" class="card-img"
                                    data-bg-image="{{ Storage::url('destinations/' . $row->image) }}"></a>

                                <!--Card Body-->
                                <div class="card-body">

                                    <figure class="ts-item__info">
                                        <h4>{{ $row->name }}</h4>
                                        <aside>
                                            <i class="fa fa-map-marker mr-2"></i>
                                            {{ $row->address }}
                                        </aside>
                                    </figure>

                                    <div class="ts-item__info-badge">
                                        @if ($row->ticket_price == 0)
                                            Tidak Diketahui
                                        @else
                                            {{ 'Rp. ' . number_format($row->ticket_price, 0, ',', '.') }}
                                        @endif
                                    </div>

                                    <div class="ts-description-lists">
                                        <dl>
                                            <dt>Jam Operasional</dt>
                                            <dd>{{ $row->opening_hours }}</dd>
                                        </dl>
                                        <dl>
                                            <dt>Kategori</dt>
                                            <dd>{{ $row->category->name }}</dd>
                                        </dl>
                                    </div>
                                </div>

                                <!--Card Footer-->
                                <a href="{{ route('peta.detail', $row->id) }}" class="card-footer">
                                    <span class="ts-btn-arrow">Detail</span>
                                </a>

                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
