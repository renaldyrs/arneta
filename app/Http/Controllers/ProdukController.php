<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use DB;
use App\Models\Produk;
use Picqer\Barcode\BarcodeGeneratorHTML;
use SimpleSoftwareIO\QrCode\Facades\QrCode;



class ProdukController extends Controller
{
    //
    public function produk()
    {
        
        $qrCode = QrCode::size(300)->generate('Hello, Laravel 11!');
  

        $supplier = DB::table('supplier')->get();

        $produk =  DB::table('produk')
        ->select(
            'supplier.nama as nama_supplier',   
            'produk.*'
        )
        ->join('supplier', 'produk.id_supplier', '=', 'supplier.id')
        ->get();
        return view('produk.produk',['produk' => $produk],['supplier' => $supplier],compact('qrCode'));
    }

    public function generateBarCode(){
        $generator = new BarcodeGeneratorHTML();
    $generator->getBarcode('123', $generator::TYPE_CODE_128);

        return view('produk.barcode',compact('generator'));
    }

    public function createproduk(Request $request){

        

        $kode = 1;
        $kode = DB::table('produk')->max('kode');
        $kode = $kode + 1;

        $produk = new Produk;
        $produk->kode = $request->$kode;
        $produk->id_supplier = $request->supplier;
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
