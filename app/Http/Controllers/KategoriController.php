<?php

namespace App\Http\Controllers;
use App\Models\Kategori;

use DB;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    //
    public function kategori(){
        $kategori = Kategori::all();

        return view('kategori.kategori',['kategori' => $kategori]);
    }

    public function tambah_kategori(){

        $id = DB::table('kategori')->max('id');
        $id = $id + 1;

        $kategori = new Kategori();
        $kategori->id = $id;
        $kategori->kode = request('kode');
        $kategori->nama = request('nama');
        $kategori->save();

        return view('kategori.kategori');
    }

    public function delete_kategori($id){
        DB::table('kategori')->where('id', $id)->delete();
        return redirect('/kategori');
    }

    public function update_kategori(Request $request, $id){
        DB::table('kategori')->where('id', $id)->update([
            'kode' => $request->input('kode'),
            'nama' => $request->input('nama'),
        ]);
        return redirect('/kategori');
    }
}
