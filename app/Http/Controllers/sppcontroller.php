<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spp;


class sppcontroller extends Controller
{
    public function index()
    {
        $spp =Spp::all();

        return view('spp.index', compact('spp'));
    }

    public function tambah()
    {
        return view('spp.tambah');
    }

    public function simpan(Request $request)
    {
        try{
            Spp::create([
                'tahun' => $request->tahun,
                'nominal' => $request->nominal,


            ]);

            return redirect('spp')->with('sukses' ,'data berhassil');
        }catch(\Exception $e){
            return redirect('spp')->with('gagal' ,'data gagal');
        }
    }

    public function edit($id)
    {
        try{
            $spp = Spp::findOrFail($id);

        return view('spp.edit', compact('spp'));

            return redirect('spp')->with('sukses' ,'data berhassil');
        }catch(\Exception $e){
            return redirect('spp')->with('gagal' ,'data gagal');
        }
    }

    public function update(Request $request)
    {
        try{
            Spp::where('id', $request->id)->update([
                'tahun' => $request->tahun,
                'nominal' => $request->nominal,
            ]);

            return redirect('spp')->with('sukses' ,'data berhassil');
        }catch(\Exception $e){
            return redirect('spp')->with('gagal' ,'data gagal');
        }
    }

    public function hapus($id)
    {
        try{
            Spp::findOrFail($id);

            Spp::destroy($id);

            return redirect('spp')->with('sukses' ,'data berhassil di hapus');
        }catch(\Exception $e){
            return redirect('spp')->with('gagal' ,'data gagal di hapus');
        }
    }
}
