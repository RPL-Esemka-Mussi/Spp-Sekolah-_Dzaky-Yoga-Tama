@extends('mian.navbar')

@section('content')


<div class="text-center  py-5 bg-black text-white">
    <h3><B>EDIT KELAS</B></h3>
</div>
<div class="container mt-4">
    <div class="container mt-4">
        <div class="d-flex justify-content-between">
            <div>
                <h4><B>Edit Kelas</B></h4>
            </div>
            <div>
                <a href="{{ url('kelas') }}" class="btn btn-info">Kembali</a>
            </div>
        </div>
        <hr>
        <form action="{{ url('kelas/update') }}" method="POST">
        @csrf
            <input type="hidden" name="id" value="{{ $kelas->id }}">
        <div class="form-group">
            <label for="kelas">kelas</label>
            <input name="kelas" type="text" id="kelas" class="form-control" value="{{ $kelas->kelas }}" required>
        </div>

        <div class="form-group">
            <label for="kompetensi_keahlian">kompetensi keahlian</label>
            <input name="kompetensi_keahlian" type="text" id="kompetensi_keahlian" class="form-control" value="{{ $kelas->kompetensi_keahlian }}" required>
        </div>
        <div class="mt-3 text-end">
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>


        </form>
    </div>
</div>


@endsection
