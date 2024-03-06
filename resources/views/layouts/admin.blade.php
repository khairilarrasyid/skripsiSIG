<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') - Administrator</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets_be/images/logo/favicon.png') }}">

    <!-- page css -->
    @yield('page_css')

    <!-- Core css -->
    <link href="{{ asset('assets_be/css/app.min.css') }}" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            <div class="header">
                <div class="logo logo-dark">
                    <a href="#">
                        <img class="img-fluid" src="{{ asset('logo-black.png') }}" alt="Logo">
                        <img class="logo-fold img-fluid" src="{{ asset('logo-black.png') }}" alt="Logo">
                    </a>
                </div>
                <div class="logo logo-white">
                    <a href="#">
                        <img class="img-fluid" src="{{ asset('logo-white.png') }}" alt="Logo">
                        <img class="logo-fold img-fluid" src="{{ asset('logo-white.png') }}" alt="Logo">
                    </a>
                </div>
                <div class="nav-wrap">
                    <ul class="nav-left">
                        <li class="desktop-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li class="mobile-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li>
                            {{-- <a href="javascript:void(0);" data-toggle="modal" data-target="#search-drawer">
                                <i class="anticon anticon-search"></i>
                            </a> --}}
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="dropdown dropdown-animated scale-left">

                        </li>
                        <li class="dropdown dropdown-animated scale-left">
                            <div class="pointer" data-toggle="dropdown">
                                <div class="avatar avatar-image  m-h-10 m-r-15">
                                    <img src="{{ asset('assets_be/images/avatars/default-avatar.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                    <div class="d-flex m-r-50">
                                        <div class="avatar avatar-lg avatar-image">
                                            <img src="{{ asset('assets_be/images/avatars/default-avatar.jpg') }}"
                                                alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <p class="m-b-0 text-dark font-weight-semibold">{{ Auth::user()->name }}</p>
                                            {{-- <p class="m-b-0 opacity-07">UI/UX Desinger</p> --}}
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('profile') }}" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                            <span class="m-l-10">Edit Profile</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <a href="{{ route('logout') }}" class="dropdown-item d-block p-h-15 p-v-10"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                            <span class="m-l-10">Logout</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <li>
                            {{-- <a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">
                                <i class="anticon anticon-appstore"></i>
                            </a> --}}
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Header END -->

            <!-- Side Nav START -->
            <div class="side-nav">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu scrollable">
                        {{-- <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Dashboard</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="index.html">Default</a>
                                </li>
                                <li>
                                    <a href="index-crm.html">CRM</a>
                                </li>
                                <li>
                                    <a href="index-e-commerce.html">E-commerce</a>
                                </li>
                                <li>
                                    <a href="index-projects.html">Projects</a>
                                </li>
                            </ul>
                        </li> --}}
                        <li class="nav-item dropdown">
                            <a href="{{ route('admin.dashboard') }}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="{{ route('categories.index') }}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-ordered-list"></i>
                                </span>
                                <span class="title">Kategori</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="{{ route('destinations.index') }}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-environment"></i>
                                </span>
                                <span class="title">Destinasi</span>
                            </a>
                        </li>

                        {{-- <li class="nav-item dropdown">
                            <a href="{{ route('gallerys.index') }}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-picture"></i>
                                </span>
                                <span class="title">Galeri Destinasi</span>
                            </a>
                        </li> --}}

                        <li class="nav-item dropdown">
                            <a href="{{ route('penginapan.index') }}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-home"></i>
                                </span>
                                <span class="title">Penginapan</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="{{ route('tour-guides.index') }}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-reconciliation"></i>
                                </span>
                                <span class="title">Tour Guide</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="{{ route('users.index') }}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-team"></i>
                                </span>
                                <span class="title">Pengguna</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Side Nav END -->
            <div class="page-container">

                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="container-fluid p-h-0">
                        <!-- Page Container START -->
                        @yield('content')
                        <!-- Page Container END -->
                    </div>
                </div>
                <!-- Content Wrapper END -->

                @yield('modal')

                <!-- Footer START -->
                <footer class="footer">
                    <div class="footer-content justify-content-between">
                        <p class="m-b-0">Copyright © 2024. All rights reserved.</p>
                    </div>
                </footer>
                <!-- Footer END -->

            </div>

        </div>
    </div>


    <!-- Core Vendors JS -->
    <script src="{{ asset('assets_be/js/vendors.min.js') }}"></script>

    <!-- page js -->
    <script src="{{ asset('assets_be/js/pages/chat.js') }}"></script>
    @yield('page_js')

    <!-- Core JS -->
    <script src="{{ asset('assets_be/js/app.min.js') }}"></script>

</body>

</html>
