<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class PesananController extends Controller
{
    //
    public function pesanan()
    {
        

        return view('transaksi.pesanan');
    }
}
