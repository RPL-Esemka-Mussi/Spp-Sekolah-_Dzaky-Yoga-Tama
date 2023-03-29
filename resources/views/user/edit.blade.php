@extends('mian.navbar')

@section('content')


<div class="text-center  py-5 bg-black text-white">
    <h3><b>EDIT USER</b></h3>
</div>
<div class="container mt-4">
    <div class="container mt-4">
        <div class="d-flex justify-content-between">
            <div>
                <h4><b>Edit User</b></h4>
            </div>
            <div>
                <a href="{{ url('user') }}" class="btn btn-info">Kembali</a>
            </div>
        </div>
        <hr>
        <form action="{{ url('user/update') }}" method="POST">
        @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="form-group">
            <label for="name">nama</label>
            <input name="name" type="text" id="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">email</label>
            <input name="email" type="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="password">password</label>
            <input name="password" type="password" id="password" class="form-control" placeholder="isi jika ingin mengganti">
        </div>

        <div class="form-group">
            <label for="name">nama</label>
            <select name="level" id="" class="form-select" required>
                <option value="" disabled selected>-Pilih Level User-</option>
                <option {{ $user->level == 'admin' ? 'selected' : '' }} value="admin">admin</option>
                <option {{ $user->level == 'petugas' ? 'selected' : '' }} value="petugas">petugas</option>
                <option {{ $user->level == 'siswa' ? 'selected' : '' }} value="siswa">siswa</option>
            </select>
        </div>
        <div class="mt-3 text-end">
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>


        </form>
    </div>
</div>


@endsection
