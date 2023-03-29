<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class siswacontroller extends Controller
{
    public function index()
    {
        $siswa =Siswa::with('user', 'kelas')->get();

        return view('siswa.index', compact('siswa'));
    }

    public function tambah()
    {
    $kelas = Kelas::all();

        return view('siswa.tambah', compact('kelas'));
    }

    public function simpan(Request $request)
    {

        try{
          $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'level' => 'siswa',
          ]);

          Siswa::create([
            'user_id' => $user->id,
            'nis' => $request->nis,
            'kelas_id' => $request->kelas_id,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
          ]);


            return redirect('siswa')->with('sukses' ,'data berhassil');
        }catch(\Exception $e){
            return redirect('siswa')->with('gagal' ,'data gagal');
        }
    }

    public function edit($id)
    {
        try{
            $siswa = Siswa::findOrFail($id);
            $kelas = Kelas::all();

        return view('siswa.edit', compact('siswa', 'kelas'));

            return redirect('siswa')->with('sukses' ,'data berhassil');
        }catch(\Exception $e){
            return redirect('siswa')->with('gagal' ,'data gagal');
        }
    }

    public function update(Request $request)
    {
        try{
            $siswa = Siswa::findOrFail($request->id);

            if($request->password != null){
                User::where('id', $siswa->user_id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),

                ]);
            }else{
                User::where('id', $siswa->user_id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);

            }


            Siswa::where('id', $request->id)->update([
                'nis' => $request->nis,
                'kelas_id' => $request->kelas_id,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
            ]);

            return redirect('siswa')->with('sukses' ,'data berhassil');
        }catch(\Exception $e){
            return redirect('siswa')->with('gagal' ,'data gagal');
        }
    }

    public function hapus($id)
    {
        try{
            $siswa = Siswa::findOrFail($id);
            Siswa::destroy($siswa->id);
            User::destroy($siswa->user_id);


            return redirect('siswa')->with('sukses' ,'data berhassil di hapus');
        }catch(\Exception $e){
            return redirect('siswa')->with('gagal' ,'data gagal di hapus');
        }
    }
}
