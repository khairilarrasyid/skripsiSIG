@extends('layouts.front')

@section('title', $title)

@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets_fe/css/jquery.scrollbar.css') }}">
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
        <section id="ts-hero" class="mb-0">

            <!--Fullscreen mode-->
            <div class="ts-full-screen d-flex flex-column">

                <!-- FORM
                            =========================================================================================================-->
                <section class="ts-shadow__sm ts-z-index__2 ts-bg-light">

                    <!--Collapse Button-->
                    <div class="position-absolute w-100 ts-bottom__0 ts-z-index__1 text-center ts-h-0 d-block d-sm-none">
                        <button type="button" class="ts-circle p-3 bg-white ts-shadow__sm border-0 ts-push-up__50 mt-2"
                            data-toggle="collapse" data-target="#form-collapse">
                            <i class="fa fa-chevron-up ts-text-color-primary ts-visible-on-uncollapsed"></i>
                            <i class="fa fa-chevron-down ts-text-color-primary ts-visible-on-collapsed"></i>
                        </button>
                    </div>

                    <!--Form-->
                    <div id="form-collapse" class="collapse ts-xs-hide-collapse show">

                        <form class="ts-form mb-0 d-flex flex-column flex-sm-row py-2 pl-2 pr-3" id="search-destinasi">

                            <!--Keyword-->
                            <div class="form-group m-1 w-100">
                                <input type="text" class="form-control" id="keyword" name="keyword"
                                    placeholder="Cari Destinasi Impian mu">
                            </div>

                            <input type="hidden" name="base_url" id="base_url" value="{{ url('/') }}">
                            <input type="hidden" name="url_storage" id="url_storage"
                                value="{{ url('/storage/destinations/') }}">

                            <!--Category-->
                            <div class="form-group m-1 w-100">
                                <select class="custom-select" id="category" name="category">
                                    <option value="">Kategori</option>
                                    @foreach ($categorys as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--Submit button-->
                            <div class="form-group m-1 ml-auto">
                                <button type="submit" class="btn btn-primary" id="search-btn">Cari Sekarang</button>
                            </div>
                        </form>
                    </div>
                    <!--end Form-->

                </section>
                <!--end ts-form__grid-->

                <!-- RESULTS & MAP
                            =========================================================================================================-->
                <div class="d-flex h-100">

                    <!-- RESULTS LEFT
                                =====================================================================================================-->
                    <div
                        class="ts-results__vertical ts-results__vertical-list ts-shadow__sm scrollbar-inner bg-white ts-z-index__2">

                        <!--Results wrapper-->
                        <section id="ts-results">
                            <div class="ts-results-wrapper"></div>
                        </section>

                    </div>
                    <!--end ts-results-vertical-->

                    <!-- MAP
                                =====================================================================================================-->
                    <div class="ts-map w-100 ts-z-index__1">
                        <div id="ts-map-hero" class="h-100 ts-z-index__1"
                            data-ts-map-leaflet-provider="https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}"
                            data-ts-map-leaflet-attribution="Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ, TomTom, Intermap, iPC, USGS, FAO, NPS, NRCAN, GeoBase, Kadaster NL, Ordnance Survey, Esri Japan, METI, Esri China (Hong Kong), and the GIS User Community"
                            data-ts-map-controls="1" data-ts-map-scroll-wheel="1" data-ts-map-zoom="11"
                            data-ts-map-center-latitude="-1.8370814" data-ts-map-center-longitude="114.7811731"
                            data-ts-locale="id-ID" data-ts-currency="IDR" data-ts-unit="m<sup>2</sup>"
                            data-ts-display-additional-info="jamOperasional_Jam Operasional;kategori_Kategori">
                        </div>
                    </div>

                </div>
                <!--end d-flex h-100-->

            </div>
            <!--end full-screen-->

        </section>
        <!--end ts-hero-->
    </main>
@endsection
