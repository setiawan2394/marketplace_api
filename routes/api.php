<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;

// 🔹 TEST API
Route::get('/test', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'API Marketplace Laravel jalan'
    ]);
});

// 🔐 AUTH (PUBLIC)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// 🔒 PROTECTED
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthController::class, 'logout']);

    // PRODUK
    Route::apiResource('produk', ProdukController::class);

    // TRANSAKSI
    Route::apiResource('transaksi', TransaksiController::class);
});