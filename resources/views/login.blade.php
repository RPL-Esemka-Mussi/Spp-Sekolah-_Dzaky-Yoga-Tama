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
    {{-- ----------------------- NAVBAR ------------------------ --}}
    <nav class="navbar navbar-expand-lg bg-success navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><b>SPP sekolah</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>


    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand  mx-auto" href="#"><b>oiii kiyomasaa</b></a>
    </header>

    {{-- -------------------------- FORMLOGIN ------------------------------ --}}



    <main class="form-signin w-50 m-auto text-center ">
        <h1 class="h3 mb-3 fw-normal py-5"><b>bang login bang</b></h1>
        {{-- alert --}}
        @if (session()->has('sukses'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat..</strong>{{ session('sukses') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 
        @endif
        @if (session()->has('eror'))
            <div class="alert d-flex alert-danger alert-dismissible fade show w-50 mx-auto mt-3" role="alert">
                {{ session('eror') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- endalert --}}
        <form action="/masuk" method="post">
            @csrf

            <div class="form-floating mt-2">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    id="email" value="{{ old('email') }}" placeholder="name@spp.id" autofocus required>
                <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating my-3 ">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                    required>
                <label for="password">Password</label>
            </div>

            <button class="w-50 btn btn-lg btn-primary " type="submit">Sign in</button>
            <small class="d-flex justify-content-center mt-3">Ayo Daftar Sekarang dan Miliki_<a
                    href="http://wa.me/6282324076680/?text= Min Aku Mau Daftar🙏🙏"> Akunmu!!</a></small>
        </form>
    </main>

    {{-- --------------------------------------- TEMPAT JS ----------------------------------- --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>

</body>

</html>
