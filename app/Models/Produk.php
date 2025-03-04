<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    //
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'kode',
        'id_supplier',
        'nama_produk',
        'jumlah',
        'total',
        'harga_beli',
        'harga_jual',
        'tanggal',
        'stock',
         
    ];
}
