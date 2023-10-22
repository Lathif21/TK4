<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPenjualan extends Model
{
    protected $table = 'laporan_penjualan';

    protected $fillable = ['barang_id', 'jumlah', 'hargaJual', 'total'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
