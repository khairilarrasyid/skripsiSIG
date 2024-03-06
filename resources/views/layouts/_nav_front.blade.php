<nav id="ts-primary-navigation" class="navbar navbar-expand-md navbar-light">
    <div class="container">

        <!--Brand Logo-->
        <a class="navbar-brand" href="{{ route('home')}}">
            <img src="{{ asset('logo-white.png')}}" alt="" width="30%">
        </a>

        <!--Responsive Collapse Button-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPrimary" aria-controls="navbarPrimary" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!--Collapsing Navigation-->
        <div class="collapse navbar-collapse" id="navbarPrimary">

            <!--LEFT NAVIGATION MAIN LEVEL
            =================================================================================================-->
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('peta') }}">Peta Sebaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('wisata') }}">Destinasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('penginapan') }}">Penginapan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('tour-guide') }}">Tour Guide</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link active" href="about-us.html">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="contact.html">Kontak</a>
                </li> --}}

            </ul>
            <!--end Left navigation main level-->

        </div>
        <!--end navbar-collapse-->
    </div>
    <!--end container-->
</nav>