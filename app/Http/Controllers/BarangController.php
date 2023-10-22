<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pengguna;


class BarangController extends Controller
{
    public function show()
    {
        $barangData = Barang::all(); // Fetch all barang items from the database

        return view('admin.barang', ['barangData' => $barangData]);
    } 

    public function create()
    {
        $penggunaData = Pengguna::all();
        return view('admin.create_barang',['penggunaData' => $penggunaData]);
    }

    
    /**
     * Store a newly created barang item in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the form data, including the idBarang field
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'satuan' => 'required|string|max:50',
            'hargaJual' => 'required|numeric',
            'id_pengguna' => 'required|string|max:20',
        ]);

        // Create the new barang item
        Barang::create([
            'nama_barang' => $request->nama_barang,
            'keterangan' => $request->keterangan,
            'satuan' => $request->satuan,
            'hargaJual' => $request->hargaJual,
            'id_pengguna' => $request->id_pengguna,
        ]);

        // Redirect back to the index page (or any other page you prefer)
        return redirect()->route('admin.barang')->with('success', 'Barang successfully added.');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id); // Fetch the specific barang data using the provided ID

        // Fetch pengguna data for the select dropdown
        $penggunaData = Pengguna::all();

        return view('admin.edit_barang', ['barang' => $barang, 'penggunaData' => $penggunaData]);
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id); // Fetch the specific barang data using the provided ID

        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'satuan' => 'required|string|max:50',
            'hargaJual' => 'required|numeric',
            'id_pengguna' => 'required|string|max:20',
        ]);
    
        // Update the existing barang data
        $barang->update([
            'nama_barang' => $request->nama_barang,
            'keterangan' => $request->keterangan,
            'satuan' => $request->satuan,
            'hargaJual' => $request->hargaJual,
            'id_pengguna' => $request->id_pengguna,
        ]);

        // Redirect back to the index page (or any other page you prefer)
        return redirect()->route('admin.barang')->with('success', 'Barang successfully updated.');
    }

    public function destroy($id)
    {
        // Find the specific barang item
        $barang = Barang::findOrFail($id);

        // Delete the barang item
        $barang->delete();

        // Redirect back to the index page (or any other page you prefer)
        return redirect()->route('admin.barang')->with('success', 'Barang successfully deleted.');
    }
}
