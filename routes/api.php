<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Semua route di sini otomatis punya prefix /api
| Contoh: /api/produk
|--------------------------------------------------------------------------
*/

// 🔹 TEST API
Route::get('/test', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'API Marketplace Laravel jalan'
    ]);
});


// ==========================
// 📦 PRODUK API
// ==========================

// Ambil semua produk
Route::get('/produk', [ProdukController::class, 'index']);

// Ambil detail produk berdasarkan ID
Route::get('/produk/{id}', [ProdukController::class, 'show']);


// ==========================
// 🧾 TRANSAKSI API
// ==========================

// Ambil semua transaksi
Route::get('/transaksi', [TransaksiController::class, 'index']);

// Ambil detail transaksi
Route::get('/transaksi/{id}', [TransaksiController::class, 'show']);


// ==========================
// 👤 USER (OPTIONAL)
// ==========================

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});