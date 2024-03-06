@extends('layouts.front')

@section('title', $title)

@section('content')
@include('layouts._hero_front')
    <main id="ts-main">

        <!-- FEATURED PROPERTIES
            =============================================================================================================-->
        <section id="featured-properties" class="ts-block pt-5  bg-white">
            <div class="container">

                <!--Title-->
                <div class="ts-title text-center">
                    <h2>Rekomendasi Wisata</h2>
                </div>

                <div class="row">

                    @foreach ($rekomendasi as $data)
                        
                    <div class="col-sm-6 col-lg-4">

                        <div class="card ts-item ts-card ts-item__lg">
                            <!--Card Image-->
                            <a href="{{ route('peta.detail', $data->id)}}" class="card-img ts-item__image"
                                data-bg-image="{{ Storage::url('destinations/' . $data->image) }}">
                                <figure class="ts-item__info">
                                    <h4>{{ $data->name }}</h4>
                                    <aside>
                                        <i class="fa fa-map-marker mr-2"></i>
                                        {{ $data->address }}
                                    </aside>
                                </figure>
                            </a>

                            <!--Card Body-->
                            <div class="card-body">
                                <div class="ts-description-lists">
                                    <dl>
                                        <dt>Jam Operasinal</dt>
                                        <dd>
                                            @if ($data->opening_hours == null) 
                                                -
                                            @else
                                                {{ $data->opening_hours }}
                                            @endif
                                        </dd>
                                    </dl>
                                    <dl>
                                        <dt>Tiket Masuk</dt>
                                        <dd>Rp. {{ number_format($data->ticket_price) }}</dd>
                                    </dl>
                                </div>
                            </div>

                            <!--Card Footer-->
                            <a href="{{ route('peta.detail', $data->id)}}" class="card-footer">
                                <span class="ts-btn-arrow">Detail</span>
                            </a>

                        </div>
                        <!--end ts-item-->
                    </div>

                    @endforeach

                </div>
                <!--end row-->

                <!--All properties button-->
                <div class="text-center mt-3">
                    <a href="{{ route('wisata') }}" class="btn btn-outline-dark ts-btn-border-muted">Lihat Semua</a>
                </div>

            </div>
            <!--end container-->
        </section>

          <!-- FEATURED PROPERTIES
            =============================================================================================================-->
            <section id="featured-properties" class="ts-block pt-5 ">
                <div class="container">
    
                    <!--Title-->
                    <div class="ts-title text-center">
                        <h2>Rekomendasi Penginapan</h2>
                    </div>
    
                    <div class="row">
    
                        @foreach ($penginapan as $data)
                            
                        <div class="col-sm-6 col-lg-4">
    
                            <div class="card ts-item ts-card ts-item__lg">
                                <!--Card Image-->
                                <a href="{{ route('penginapan.detail', $data->id)}}" class="card-img ts-item__image"
                                    data-bg-image="{{ Storage::url('destinations/' . $data->image) }}">
                                    <figure class="ts-item__info">
                                        <h4>{{ $data->name }}</h4>
                                        <aside>
                                            <i class="fa fa-map-marker mr-2"></i>
                                            {{ $data->address }}
                                        </aside>
                                    </figure>
                                </a>
    
                                <!--Card Body-->
                                <div class="card-body">
                                    <div class="ts-description-lists">
                                        <dl>
                                            <dt>Jam Operasinal</dt>
                                            <dd>
                                                @if ($data->opening_hours == null) 
                                                    -
                                                @else
                                                    {{ $data->opening_hours }}
                                                @endif
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>Tiket Masuk</dt>
                                            <dd>Rp. {{ number_format($data->ticket_price) }}</dd>
                                        </dl>
                                    </div>
                                </div>
    
                                <!--Card Footer-->
                                <a href="{{ route('penginapan.detail', $data->id)}}" class="card-footer">
                                    <span class="ts-btn-arrow">Detail</span>
                                </a>
    
                            </div>
                            <!--end ts-item-->
                        </div>
    
                        @endforeach
    
                    </div>
                    <!--end row-->
    
                    <!--All properties button-->
                    <div class="text-center mt-3">
                        <a href="{{ route('penginapan') }}" class="btn btn-outline-dark ts-btn-border-muted">Lihat Semua</a>
                    </div>
    
                </div>
                <!--end container-->
            </section>

        <!--ITEM CAROUSEL
            =============================================================================================================-->
        <section class="ts-block" data-bg-pattern="{{ asset('assets_fe/img/bg-pattern-dot.png') }}">

            <!--Title-->
            <div class="ts-title text-center">
                <h2>Wisata Terbaru</h2>
            </div>

            <!--Carousel-->
            <div class="owl-carousel ts-items-carousel" data-owl-items="5" data-owl-dots="1">

                @foreach ($terbaru as $row)
                    
                <!--Item-->
                <div class="slide">

                    <div class="card ts-item ts-card ts-item__lg">

                        <!--Card Image-->
                        <a href="{{ route('peta.detail', $row->id) }}" class="card-img ts-item__image"
                            data-bg-image="{{ Storage::url('destinations/' . $row->image) }}">
                            <figure class="ts-item__info">
                                <h4>{{ $row->name }}</h4>
                                <aside>
                                    <i class="fa fa-map-marker mr-2"></i>
                                    {{ $row->address }}
                                </aside>
                            </figure>
                        </a>

                        <!--Card Body-->
                        <div class="card-body">
                            <div class="ts-description-lists">
                                <dl>
                                    <dt>Jam Operasinal</dt>
                                    <dd>
                                        @if ($row->opening_hours == null) 
                                            -
                                        @else
                                            {{ $row->opening_hours }}
                                        @endif
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>Tiket Masuk</dt>
                                    <dd>Rp. {{ number_format($row->ticket_price) }}</dd>
                                </dl>
                            </div>
                        </div>

                        <!--Card Footer-->
                        <a href="{{ route('peta.detail', $row->id) }}" class="card-footer">
                            <span class="ts-btn-arrow">Detail</span>
                        </a>

                    </div>
                    <!--end ts-item-->
                </div>
                <!--end slide-->

                @endforeach

            </div>
        </section>
        <!--end ts-block-->
    </main>
@endsection
