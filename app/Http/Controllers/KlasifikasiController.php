<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KlasifikasiModel;
use Illuminate\Support\Facades\DB;

class KlasifikasiController extends Controller
{
    public function klasifikasi()
    {
        $klasifikasi = KlasifikasiModel::select('*')->get();
        return view('klasifikasi', ['klasifikasi' => $klasifikasi]);
    }

    public function tambahKlasifikasi(Request $request)
    {
        // Validate the request
        $request->validate([
            'nama_klasifikasi' => 'required|string|max:255',
        ]);

        // Create a new classification
        KlasifikasiModel::create([
            'nama_klasifikasi' => $request->nama_klasifikasi,
        ]);
        // Flash the success message to the session
        return redirect()->route('klasifikasi')->with('message', 'Klasifikasi Ditambahkan');
    }

    public function edit($id)
    {
        $klasifikasi = KlasifikasiModel::findOrFail($id);
        return view('klasifikasi', compact('klasifikasi'));
    }

    public function update(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'nama_klasifikasi' => 'required|string|max:255',
    ]);

    // Find the klasifikasi
    $klasifikasi = KlasifikasiModel::findOrFail($id);

    // Update the klasifikasi
    $klasifikasi->update([
        'nama_klasifikasi' => $request->nama_klasifikasi,
    ]);

    return redirect()->route('klasifikasi')->with('message', 'Klasifikasi Diperbarui');
}


    public function destroy($id)
    {
        $klasifikasi = KlasifikasiModel::findOrFail($id);
        $klasifikasi->delete();

        return redirect()->route('klasifikasi')->with('message', 'Klasifikasi Dihapus');
    }
}
