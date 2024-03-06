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
                    <h2>Detail Tour Guide</h2>
                </div>

            </div>
        </section>

        <!--AGENT INFO
                =========================================================================================================-->
        <section id="agent-info">
            <div class="container">

                <!--Box-->
                <div class="ts-box">

                    <!--Ribbon-->
                    <div class="ts-ribbon">
                        <i class="fa fa-thumbs-up"></i>
                    </div>

                    <!--Row-->
                    <div class="row">

                        <!--Brand-->
                        <div class="col-md-4 ts-center__both">
                            <div class="ts-circle__xxl ts-shadow__md" data-bg-image="{{ Storage::url('tour-guide/'.$tour_guide->foto) }}"></div>
                        </div>

                        <!--Description-->
                        <div class="col-md-8">

                            <div class="py-4">

                                <!--Title-->
                                <div class="ts-title mb-2">
                                    <h2 class="mb-1">{{ $tour_guide->name }}</h2>
                                    <h5>
                                        <i class="fa fa-map-marker mr-2"></i>
                                        {{ $tour_guide->address }}
                                    </h5>
                                </div>

                                <!--Row-->
                                <div class="row">

                                    <div class="col-md-7">
                                        <p>
                                            {!! $tour_guide->description !!}
                                        </p>
                                    </div>

                                    <div class="col-md-5 ts-opacity__50">

                                        <!--Phone-->
                                        <figure class="mb-1">
                                            <i class="fa fa-phone-square mr-2"></i>
                                           {{ $tour_guide->phone }}
                                        </figure>

                                        <!--Mail-->
                                        <figure class="mb-1">
                                            <i class="fa fa-envelope mr-2"></i>
                                            <a href="#">{{ $tour_guide->email }}</a>
                                        </figure>

                                    </div>

                                </div>
                                <!--end row-->
                            </div>
                            <!--end p-4-->

                        </div>
                        <!--end col-md-8-->
                    </div>
                    <!--end row-->
                </div>
                <!--end ts-box-->

            </div>
            <!--end container-->
        </section>
        <!--end #agent-info-->

    </main>
@endsection
