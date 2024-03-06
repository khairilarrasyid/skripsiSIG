<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="ThemeStarz">

    <!--CSS -->
    <link rel="stylesheet" href="{{ asset('assets_fe/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_fe/font-awesome/css/fontawesome-all.min.css') }}">
    @yield('page_css')
    <link rel="stylesheet" href="{{ asset('assets_fe/css/style.css') }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

</head>

<body>

<!-- WRAPPER
=====================================================================================================================-->
<div class="ts-page-wrapper ts-homepage" id="page-top">

    <!--*********************************************************************************************************-->
    <!--HEADER **************************************************************************************************-->
    <!--*********************************************************************************************************-->
    <header id="ts-header" class="fixed-top navbar-dark">

        <!--PRIMARY NAVIGATION
        =============================================================================================================-->
        @include('layouts._nav_front')
        <!--end #ts-primary-navigation.navbar-->

    </header>
    <!--end Header-->

    @yield('content')


    <footer id="ts-footer">


        <!--SECONDARY FOOTER CONTENT
        =============================================================================================================-->
        <section id="ts-footer-secondary">
            <div class="container">

                <!--Copyright-->
                <div class="ts-copyright">(C) 2024. All rights reserved</div>

                <!--Social Icons-->
                <div class="ts-footer-nav">
                    {{-- <nav class="nav">
                        <a href="#" class="nav-link">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="nav-link">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="nav-link">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                        <a href="#" class="nav-link">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </nav> --}}
                </div>
                <!--end ts-footer-nav-->

            </div>
            <!--end container-->
        </section>
        <!--end ts-footer-secondary-->

    </footer>
    <!--end #ts-footer-->

</div>
<!--end page-->

<script src="{{ asset('assets_fe/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets_fe/js/popper.min.js') }}"></script>
<script src="{{ asset('assets_fe/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets_fe/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets_fe/js/owl.carousel.min.js') }}"></script>
@yield('page_js')
<script src="{{ asset('assets_fe/js/custom.js') }}"></script>


</body>
</html>