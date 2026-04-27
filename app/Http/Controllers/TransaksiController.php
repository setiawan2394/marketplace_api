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
public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'harga' => 'required|numeric'
    ]);

    $produk = Produk::create($request->all());

    return response()->json([
        'status' => 'success',
        'message' => 'Produk berhasil ditambahkan',
        'data' => $produk
    ]);
}
}
