<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use DB;
use App\Models\Produk;
use App\Models\Kategori;
use Picqer\Barcode\BarcodeGeneratorHTML;
use SimpleSoftwareIO\QrCode\Facades\QrCode;



class ProdukController extends Controller
{
    //
    public function produk()
    {
        
        $kategori = DB::table('kategori')
        ->select('kategori.*')
        ->get();
        $supplier = DB::table('supplier')->get();

        $produk =  DB::table('produk')
        ->select(
            'supplier.nama as nama_supplier', 
            'kategori.nama as nama_kategori', 
            'kategori.id as id_kategori', 
            'kategori.kode as kode_kategori',
            'produk.*'
        )
        ->join('supplier', 'produk.id_supplier', '=', 'supplier.id')
        ->join('kategori', 'produk.id_kategori', '=', 'kategori.id')
        ->get();
        return view('produk.produk',['produk' => $produk, 'kategori' => $kategori, 'supplier' => $supplier]);
    }

    public function createproduk(Request $request){

        $huruf = DB::table('kategori')->where('id', $request->kategori)->value('kode');

        

        
        $cek = Produk::where('kode','like', $huruf.'%')->latest()->first();
        if($cek == null){
            $kodeurut = $huruf."0001";
        }else{
            
            $kodeurut = $cek->kode;
            $kodeurut++;
            
            
        }

        $kode =$kodeurut;
        
        $produk = new Produk;
        $produk->kode = $kode;
        $produk->id_supplier = $request->supplier;
        $produk->id_kategori = $request->kategori;
        $produk->nama_produk = $request->nama_produk;
        $produk->jumlah = $request->jumlah;
        $produk->total = $request->total;
        $produk->harga_beli = $request->harga_beli;
        $produk->harga_jual = $request->harga_jual;
        $produk->tanggal = $request->tanggal;
        $produk->stock = $request->stock;
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
