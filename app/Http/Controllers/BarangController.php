<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangModel;
use App\Models\KlasifikasiModel;
use Illuminate\Support\Facades\Storage;
use Session;
use Illuminate\Support\Facades\Log;

class BarangController extends Controller
{
    // Fungsi untuk menampilkan daftar barang
    public function barang(Request $request)
    {
        $klasifikasi_id = $request->input('klasifikasi_id');
    
        if ($klasifikasi_id) {
            $barang = BarangModel::with('klasifikasi')
                        ->where('id_klasifikasi', $klasifikasi_id)
                        ->get();
        } else {
            $barang = BarangModel::with('klasifikasi')->get();
        }
    
        $klasifikasi = KlasifikasiModel::all();
        return view('databarang', ['barang' => $barang, 'klasifikasi' => $klasifikasi]);
    }
    
    public function store(Request $request)
    {
        Log::info('Store method called');
        
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'id_klasifikasi' => 'required|integer',
            'stok' => 'required|integer',
            'harga' => 'required|string|max:255',
            'foto_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        Log::info('Validation passed');
    
        if ($request->hasFile('foto_barang')) {
            $path = $request->file('foto_barang')->store('images', 'public');
            $validatedData['foto_barang'] = $path;
        }
    
        BarangModel::create($validatedData);
    
        Log::info('Barang created');
    
        return redirect()->route('databarang')->with('message', 'Barang berhasil ditambahkan');
    }
    
    
    public function edit($id)
{
    $barang = BarangModel::findOrFail($id);
    $klasifikasi = KlasifikasiModel::all();
    return view('editbarang', ['barang' => $barang, 'klasifikasi' => $klasifikasi]);
}

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'id_klasifikasi' => 'required|integer',
            'stok' => 'required|integer',
            'harga' => 'required|string|max:255',
            'foto_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $barang = BarangModel::findOrFail($id);

        if ($request->hasFile('foto_barang')) {
            // Hapus foto lama jika ada
            if ($barang->foto_barang) {
                Storage::disk('public')->delete($barang->foto_barang);
            }
            // Upload foto baru
            $path = $request->file('foto_barang')->store('images', 'public');
            $validatedData['foto_barang'] = $path;
        }

        $barang->update($validatedData);

        return redirect()->route('databarang')->with('message', 'Barang berhasil diperbarui');
    }  

    public function destroy($id)
    {
        $barang = BarangModel::findOrFail($id);
        $barang->delete();
        return redirect()->route('databarang')->with('message', 'Barang berhasil dihapus');
    }
    
}
