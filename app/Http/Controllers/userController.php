<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {
        $users =User::all();

        return view('user.index', compact('users'));
    }

    public function tambah()
    {
        return view('user.tambah');
    }

    public function simpan(Request $request)
    {
        try{
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'level' => $request->level,

            ]);

            return redirect('user')->with('sukses' ,'data berhassil');
        }catch(\Exception $e){
            return redirect('user')->with('gagal' ,'data gagal');
        }
    }

    public function edit($id)
    {
        try{
            $user = User::findOrFail($id);

        return view('user.edit', compact('user'));

            return redirect('user')->with('sukses' ,'data berhassil');
        }catch(\Exception $e){
            return redirect('user')->with('gagal' ,'data gagal');
        }
    }

    public function update(Request $request)
    {
        try{
            if($request->password != null){
                User::where('id', $request->id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'level' => $request->level,

                ]);
            }else{
                User::where('id', $request->id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'level' => $request->level
                ]);

            }
            return redirect('user')->with('sukses' ,'data berhassil');
        }catch(\Exception $e){
            return redirect('user')->with('gagal' ,'data gagal');
        }
    }

    public function hapus($id)
    {
        try{
            User::findOrFail($id);

            User::destroy($id);

            return redirect('user')->with('sukses' ,'data berhassil di hapus');
        }catch(\Exception $e){
            return redirect('user')->with('gagal' ,'data gagal di hapus');
        }
    }
}
