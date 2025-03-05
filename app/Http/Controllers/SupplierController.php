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

    public function tambah_supplier(Request $request){
        $id = DB::table('supplier')->max('id');
            $id = $id + 1;
        
        DB::table('supplier')->insert([
            'id' => $id,
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'no' => $request->input('no'),
        ]);
        return redirect('supplier');
    }

    public function delete_supplier($id){
        DB::table('supplier')->where('id', $id)->delete();
        return redirect('supplier');
    }

    public function update_supplier(Request $request, $id){
        DB::table('supplier')->where('id', $id)->update([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'no_telepon' => $request->input('no_telepon'),
        ]);
        return redirect('supplier');
    }
}
