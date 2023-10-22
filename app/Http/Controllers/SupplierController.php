<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Pengguna;

class SupplierController extends Controller
{
    
    public function show()
    {
        $supplierData = Supplier::all(); // Fetch all supplier data from the database
        
        return view('admin.supplier', ['supplierData' => $supplierData]);
    } 
}
