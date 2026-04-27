<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    protected $fillable = [
        'nama_produk', 'harga', 'deskripsi', 'user_id'
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}
}