@extends('mian.navbar')

@section('content')
    <div class="text-center mt- py-5 bg-black text-white">
        <h3><b>KELAS</b></h3>
    </div>
    <div class="container mt-4">
        <div class="d-flex justify-content-between">
            <div>
                <h4><b>Data Kelas</b></h4>
            </div>
            <div>
                <a href="{{ url('kelas/tambah') }}" class="btn btn-success">Tambah</a>
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
                    <td><b>Kelas</b></td>
                    <td><b>Kompetensi Keahlian</b></td>
                    <td><b>Kelola</b></td>
                </tr>
            </thead>
            <tbody>
               @if ($kelas->count() == 0)
               <tr class="text-center">
                <td colspan="4"><b>data tidak ada</b></td>
               </tr>

                @else
                   @foreach ($kelas as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->kelas }}</td>
                    <td>{{ $data->kompetensi_keahlian }}</td>
                    <td>
                        <a href='{{ url("kelas/hapus/$data->id") }}' class="btn btn-danger btn-sm">Hapus</a>
                        <a href='{{ url("kelas/edit/$data->id") }}' class="btn btn-info btn-sm">Edit</a>
                    </td>
                </tr>
                  @endforeach
               @endif

            </tbody>
        </table>
    @endsection
