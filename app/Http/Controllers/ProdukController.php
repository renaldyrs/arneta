<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use DB;
use App\Models\Produk;


class ProdukController extends Controller
{
    //
    public function produk()
    {
        $supplier = DB::table('supplier')->get();

        $produk =  DB::table('produk')
        ->select(
            'supplier.nama as nama_supplier',   
            'produk.*'
        )
        ->join('supplier', 'produk.id_supplier', '=', 'supplier.id')
        ->get();
        return view('produk.produk',['produk' => $produk],['supplier' => $supplier]);
    }

    public function createproduk(Request $request){

        $kode = DB::table('produk')->max('kode');
        $kode = $kode + 1;

        $produk = new Produk;
        $produk->kode = $request->$kode;
        $produk->id_supplier = $request->supplier;
        $produk->nama_produk = $request->nama_produk;
        $produk->jumlah = $request->jumlah;
        $produk->harga_awal = $request->harga_awal;
        $produk->harga_akhir = $request->harga_akhir;
        $produk->tanggal = $request->tanggal;
        $produk->stock_awal = $request->stock_awal;
        $produk->stock_akhir = $request->stock_akhir;
        
        $produk->save();
        alert()->success('Success', 'Produk Berhasil Ditambahkan');
        
        return redirect('/produk');
    }

    public function deleteproduk($kode){
        $produk = Produk::where('kode', $kode);
        $produk->delete();
        alert()->success('Success', 'Produk Berhasil Dihapus');
        return redirect('/produk');
    }
}
