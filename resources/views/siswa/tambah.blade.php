@extends('mian.navbar')

@section('content')


<div class="text-center  py-5 bg-black text-white">
    <h3><B>TAMBAH SISWA</B></h3>
</div>
<div class="container mt-4">
    <div class="container mt-4">
        <div class="d-flex justify-content-between">
            <div>
                <h4><B>Tambah Siswa</B></h4>
            </div>
            <div>
                <a href="{{ url('siswa') }}" class="btn btn-info">Kembali</a>
            </div>
        </div>
        <hr>
        <form action="{{ url('siswa/simpan') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nis">NIS</label>
            <input name="nis" type="text" id="nis" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="name">nama</label>
            <input name="name" type="text" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">email</label>
            <input name="email" type="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">password</label>
            <input name="password" type="password" id="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="kelas">kelas</label>
            <select name="kelas_id" id="kelas_id" class="form-select">
                <option value="" disabled selected>-Pilih Kelas-</option>
                @foreach ($kelas as $kelas)
                <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                @endforeach
            </select>


        </div>

        <div class="form-group">
            <label for="alamat">alamat</label>
            <input name="alamat" type="text" id="alamat" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="no_hp">no_hp</label>
            <input name="no_hp" type="number" id="no_hp" class="form-control" required>
        </div>
        <div class="mt-3 text-end">
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>


        </form>
    </div>
</div>


@endsection
