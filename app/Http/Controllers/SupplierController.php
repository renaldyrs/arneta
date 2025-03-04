<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SupplierController extends Controller
{
    //
    public function supplier(){
        $supplier = DB::table('supplier')->get();

        return view('supplier/supplier',['supplier' => $supplier]);
    }
}
