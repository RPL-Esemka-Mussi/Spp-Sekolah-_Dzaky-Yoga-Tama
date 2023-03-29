@extends('mian.navbar')

@section('content')
    <div class="text-center  py-5 bg-black text-white">
        <h3>PEMBAYARAN</h3>
    </div>
    <div class="container mt-4">
        <div class="d-flex justify-content-between">
            <div>
                <h4><b>Kelola Pembayaran</b></h4>
            </div>
            <form class="row row-cols-lg-auto g-1 align-items-center" action="{{ url('pembayaran') }}" method="GET">
                <div class="col-12">
                    <input type="text" name="cari" id="cari" value="{{ $keyword != null ? $keyword : '' }}" class="form-control me-4" placeholder="search">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success ms-3">Cari<i class="bi bi-search mx-1"></i></button>
                </div>
            </form>
        </div>
    </div>
    @if (Session::has('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>yes</strong> {{ Session::get('sukses') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(Session::has('gagal'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>No</strong> {{ Session::get('gagal') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <hr>
    <div class="container mt-4">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td><b>#</b></td>
                    <td><b>Nis</b></td>
                    <td><b>Nama</b></td>
                    <td><b>kelas</b></td>
                    <td><b>Aksi</b></td>
                </tr>
            </thead>
            <tbody>
                @if ($siswa->count() == 0)
                    <tr class="text-center">
                        <td colspan="7"><b>KOSONG</b></td>
                    </tr>
                @else
                    @foreach ($siswa as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nis }}</td>
                            <td>{{ $data->user->name }}</td>
                            <td>{{ $data->kelas->kelas }}</td>
                            <td>
                                <a href='{{ url("pembayaran/transaksi/$data->id") }}' class="btn btn-info btn-sm"><i class="bi bi-credit-card mx-1"></i>Transaksi</a>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    @endsection
