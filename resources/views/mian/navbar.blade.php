<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-success navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><b>SPP sekolah</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-dark" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::segment(1) == '' ? 'active text-dark' : '' }}"
                            href="{{ url('/') }}"><b>Home</b></a>
                    </li>
                    @can('admin')

                    <li class="nav-item">
                        <a class="nav-link {{ Request::segment(1) == 'user' ? 'active text-dark' : '' }}"
                            href="{{ url('/user') }}"><b>User</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::segment(1) == 'siswa' ? 'active text-dark' : '' }}"
                            href="{{ url('/siswa') }}"><b>Siswa</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::segment(1) == 'kelas' ? 'active text-dark' : '' }}"
                            href="{{ url('/kelas') }}"><b>Kelas</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::segment(1) == 'spp' ? 'active text-dark' : '' }}"
                            href="{{ url('/spp') }}"><b>Spp</b></a>
                    </li>
                @endcan
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'pembayaran' ? 'active text-dark' : '' }}"
                                href="{{ url('/pembayaran') }}"><b>Pembayaran</b></a>
                        </li>

                </ul>
                {{-- -------------------- Button Login Logout (Auth) ---------------------}}
                <ul class="navbar-nav ms-auto">
                        @auth
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item" ><i class="bi bi-box-arrow-right"></i><b>Logout</b></button>
                                </form>
                            </li>
                        </ul>
                        @else
                        <li class="nav-item">

                            <a class="nav-link"><i class="bi bi-box-arrow-right"></i><b>Login</b></a>
                        </li>
                        @endauth
                    </ul>
            </div>
        </div>
    </nav>


    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand  mx-auto" href="{{ url('/user') }}"><b>{{ auth()->user()->name }}</b></a>
    </header>

            @yield('content')


    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>

</body>

</html>

