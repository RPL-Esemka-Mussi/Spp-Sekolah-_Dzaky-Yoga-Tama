@extends('mian.navbar')

@section('content')


    <div class="text-center py-5 bg-black text-white">
        <h3><b>TRANSAKSI SPP</b></h3>
    </div>
    <div class="container mt-4">
        <div class="container mt-4">

            <div class="d-flex justify-content-center text-center">

                <div class="card text-bg-success ms-5 me-5 w-50">
                    <div class="card-header">
                        <b>Total Bayar</b>
                    </div>
                    <div class="card-body">
                        <h3>Rp. {{ $total['total_dibayar'] }}</h3>
                    </div>
                </div>
                <div class="card text-bg-danger ms-5 me-5 w-50">
                    <div class="card-header">
                        <b>Total Belum Bayar</b>
                    </div>
                    <div class="card-body">
                        <h3>Rp. {{ $total['total_belumdibayar'] }}</h3>
                    </div>
                </div>

            </div>
        </div>
        <hr>

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

        <div class="d-flex justify-content-between">
            <div>
                <h4><b> Transaksi SPP</b></h4>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <div class="me-2"><b>NIS :{{ $siswa->nis }}</b></div>
                <div class="me-2"><b>Nama :{{ $siswa->user->name }}</b></div>
                <div><b>Kelas:{{ $siswa->kelas->kelas }}</b></div>
            </div>
            <div>
                <a href="{{ url('pembayaran') }}" class="btn btn-info"><i class="bi bi-back"></i>Kembali</a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-plus-square"></i> Tambah
                </button>

            </div>
        </div>
        <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td><b>#</b></td>
                    <td><b>Petugas</b></td>
                    <td><b>Tanggal</b></td>
                    <td><b>Tahun</b></td>
                    <td><b>Jumlah Bayar</b></td>
                    <td><b>Kelola</b></td>
                </tr>
            </thead>
            <tbody>
                @if ($pembayaran->count() == 0)
                    <tr class="text-center">
                        <td colspan="7"><b>KOSONG</b></td>
                    </tr>
                @else
                    @foreach ($pembayaran as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->user->name }}</td>
                            <td>{{ $data->tanggal_bayar }}</td>
                            <td>{{ $data->spp->tahun }}</td>
                            <td>{{ 'Rp.' . $data->jumlah_bayar }}</td>
                            <td>
                                <a href='{{ url("pembayaran/hapus/$data->id") }}' class="btn btn-danger btn-sm">Hapus</a>
                                <a href='{{ url("pembayaran/edit/$data->id") }}' class="btn btn-warning btn-sm">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>


    <!------------------------------------------------- Modal Transaksi--------------------------------------------------- -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Transaksi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('pembayaran/simpan') }}" method="post">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
                        <div class="form-group mt-2">
                            <label for="siswa"> Petugas</label>
                            <input type="text" name="petugas" id="petugas" value="{{ auth()->user()->name }}" readonly
                                class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="siswa"> Siswa</label>
                            <input type="text" name="siswa" id="siswa" value="{{ $siswa->user->name }}" readonly
                                class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="spp_id">SPP</label>
                            <select name="spp_id" id="spp_id" class="form-select" required>
                                <option value="" disabled selected>-Pilih SPP-</option>
                                @foreach ($spp as $data)
                                    @php
                                        $kurang = $data->nominal - $pembayaranSpp[$loop->iteration - 1];
                                        $kurangnya = "(Rp. $kurang)";
                                    @endphp
                                    <option value="{{ $data->id }}"
                                        {{ $pembayaranSpp[$loop->iteration - 1] >= $data->nominal ? 'disabled' : '' }}>
                                        {{ $data->tahun . ' - Rp.' . $data->nominal }}
                                        {{ $pembayaranSpp[$loop->iteration - 1] >= $data->nominal ? '(LUNAS)' : $kurangnya }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="tanggal_bayar"> Tanggal Bayar</label>
                            <input type="date" name="tanggal_bayar" id="tanggal_bayar" class="form-control" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="jumlah_bayar"> Jumlah Bayar</label>
                            <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                class="bi bi-x-circle mx-2"></i><b>Tutup</b></button>
                        <button type="submit" class="btn btn-primary "><i class="bi bi-save2 mx-2"></i><b>Save</b></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
