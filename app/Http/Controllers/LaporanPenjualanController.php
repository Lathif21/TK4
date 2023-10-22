<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\LaporanPenjualan;


class LaporanPenjualanController extends Controller
{
    public function index()
    {
        $laporanPenjualan = LaporanPenjualan::with('barang')->get();
        return view('admin.laporanpenjualan', compact('laporanPenjualan'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('admin.create_laporanpenjualan', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id_barang',
            'jumlah' => 'required|integer|min:1',
            'hargaJual' => 'required|numeric|min:0',
        ]);
        // Calculate the total
        $total = $request->jumlah * $request->hargaJual;

        // Create a new instance of LaporanPenjualan and set the 'total' attribute
        $laporanPenjualan = new LaporanPenjualan([
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'hargaJual' => $request->hargaJual,
            'total' => $total
        ]);

        // Save the new LaporanPenjualan record to the database
        $laporanPenjualan->save();

        return redirect()->route('admin.laporanpenjualan')->with('success', 'Laporan Penjualan created successfully.');
    }

    public function dashboard()
    {
        // Ambil data laporan penjualan dan barang dari database
        $dataLaporanPenjualan = LaporanPenjualan::all();
        $dataBarang = Barang::all();
    
        // Kirim data laporan penjualan dan barang ke halaman dashboard.blade.php
        return view('admin.dashboard', compact('dataLaporanPenjualan', 'dataBarang'));
    }

}
