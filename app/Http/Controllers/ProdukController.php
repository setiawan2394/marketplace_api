<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    // ✅ Ambil semua produk
    public function index()
    {
        $produk = Produk::with('user')->get();

        return response()->json([
            'status' => 'success',
            'data' => $produk
        ]);
    }

    // ✅ Ambil detail produk
    public function show($id)
    {
        $produk = Produk::find($id);

        return response()->json([
            'status' => 'success',
            'data' => $produk
        ]);
    }
}