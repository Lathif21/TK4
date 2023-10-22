<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $fillable = ['nama_barang', 'keterangan', 'satuan', 'hargaJual', 'id_pengguna'];

    // Tambahkan relasi untuk penjualan barang
    public function penjualan()
    {
        return $this->hasMany(LaporanPenjualan::class, 'barang_id');
    }

    public function pengguna()
    {
        return $this->hasMany(Pengguna::class, 'id_pengguna');
    }

  
}
