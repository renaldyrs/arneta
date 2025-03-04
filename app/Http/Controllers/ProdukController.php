<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProdukController extends Controller
{
    //
    public function produk()
    {

        $produk =  DB::table('produk')
        ->select(
            'supplier.nama as nama_supplier',   
            'produk.*'
        )
        ->join('supplier', 'produk.id_supplier', '=', 'supplier.id')
        ->get();
        return view('produk.produk',['produk' => $produk]);
    }

    public function inputproduk()
    {
        
    }
}
