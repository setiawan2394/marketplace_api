<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    // ==========================
    // 📦 GET ALL PRODUK
    // ==========================
    public function index()
    {
        $produk = Produk::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Data produk',
            'data' => $produk
        ]);
    }

    // ==========================
    // 🔍 GET DETAIL PRODUK
    // ==========================
    public function show(Produk $produk)
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Detail produk',
            'data' => $produk
        ]);
    }

    // ==========================
    // ➕ TAMBAH PRODUK (POST)
    // ==========================
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric'
        ]);

        $produk = Produk::create([
            'nama_produk' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'user_id' => auth()->id()
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Produk berhasil ditambahkan',
            'data' => $produk
        ], 201);
    }

    // ==========================
    // 🔄 UPDATE PRODUK (PUT)
    // ==========================
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric'
        ]);

        $produk->update([
            'nama_produk' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Produk berhasil diupdate',
            'data' => $produk
        ]);
    }

    // ==========================
    // 🗑️ DELETE PRODUK
    // ==========================
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Produk berhasil dihapus'
        ]);
    }
}