<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
   public function index()
{
    $transaksi = \App\Models\Transaksi::with('detail.produk')->get();

    return response()->json([
        'status' => 'success',
        'data' => $transaksi
    ]);
}
}
