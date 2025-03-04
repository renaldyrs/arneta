<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class PesananController extends Controller
{
    //
    public function pesanan()
    {
        Cart::add('192ao12', 'Product 1', 5, 9.99);
        Cart::add('1239ad0', 'Product 2', 2, 5.95);

        return view('transaksi.pesanan');
    }
}
