@extends('mian.navbar')

@section('content')
    <div class="text-center  py-5 bg-black text-white">
        <h3><b>SISWA</b></h3>
    </div>
    <div class="container mt-4">
        <div class="d-flex justify-content-between">
            <div>
                <h4><b>Data siswa</b></h4>
            </div>
            <div>
                <a href="{{ url('siswa/tambah') }}" class="btn btn-success">Tambah</a>
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
</div>

    <hr>
    <div class="container mt-4">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td><b>#</b></td>
                    <td><b>Nis</b></td>
                    <td><b>Nama</b></td>
                    <td><b>kelas</b></td>
                    <td><b>Alamat</b></td>
                    <td><b>No. HP</b></td>
                    <td><b>Kelola</b></td>
                </tr>
            </thead>
            <tbody>
               @if ($siswa->count() == 0)
               <tr class="text-center">
                <td colspan="6"><b>KOSONG</b></td>
               </tr>
                @else
                @foreach ($siswa as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nis }}</td>
                    <td>{{ $data->user->name}}</td>
                    <td>{{ $data->kelas->kelas }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->no_hp }}</td>
                    <td>
                        <a href='{{ url("siswa/hapus/$data->id") }}' class="btn btn-danger btn-sm">Hapus</a>
                        <a href='{{ url("siswa/edit/$data->id") }}' class="btn btn-info btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
               @endif

            </tbody>
        </table>
    @endsection
