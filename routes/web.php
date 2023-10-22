<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\LaporanPenjualanController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'show'])->name('admin.dashboard');


// Route to display the dashboard view
Route::get('/admin/dashboard', [DashboardController::class, 'show'])->name('admin.dashboard');

Route::get('/admin/barang', [BarangController::class, 'show'])->name('admin.barang');
// Show the form to create a new barang
Route::get('/admin/barang/create', [BarangController::class, 'create'])->name('admin.barang.create');

// Store the new barang data
Route::post('/admin/barang/store', [BarangController::class, 'store'])->name('admin.barang.store');

// Show the form to edit an existing barang
Route::get('/admin/barang/edit/{id}', [BarangController::class, 'edit'])->name('admin.barang.edit');

// Update the edited barang data
Route::put('/admin/barang/update/{id}', [BarangController::class, 'update'])->name('admin.barang.update');

// Delete a barang item
Route::delete('/admin/barang/delete/{id}', [BarangController::class, 'destroy'])->name('admin.barang.delete');


Route::get('/admin/supplier', [SupplierController::class, 'show'])->name('admin.supplier');


Route::get('/admin/laporanpenjualan', [LaporanPenjualanController::class, 'index'])->name('admin.laporanpenjualan');
Route::get('/admin/laporanpenjualan/create', [LaporanPenjualanController::class, 'create'])->name('admin.laporanpenjualan.create');
Route::post('/admin/laporanpenjualan/store', [LaporanPenjualanController::class, 'store'])->name('admin.laporanpenjualan.store');

Route::get('/admin/dashboard', [LaporanPenjualanController::class, 'dashboard'])->name('admin.dashboard');

