<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ShowAddFrom()
    {
        return view('admin.kelola-berita.add');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'nama' => 'required|string|max:255',
        'jumlah' => 'required|integer',
        'harga' => 'required|integer',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'tanggal_kadaluarsa' => 'required|date',
    ]);

    $data = $request->only(['nama', 'jumlah', 'harga', 'tanggal_kadaluarsa']);

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/foto_produk', $filename);
        $data['foto'] = $filename;
    }

    Produk::create($data);

    return redirect()->back()->with('success', 'Produk berhasil disimpan!');
    }

    /**a
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produk = Produk::findOrFail($id);

    $produk->nama = $request->nama;
    $produk->jumlah = $request->jumlah;
    $produk->harga = $request->harga;
    $produk->tanggal_kadaluarsa = $request->tanggal_kadaluarsa;

    if ($request->hasFile('foto')) {
        $path = $request->file('foto')->store('produk', 'public');
        $produk->foto = $path;
    }

    $produk->save();

    return redirect()->back()->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $produk = Produk::findOrFail($id);

    // Hapus file foto dari storage jika ada
    if ($produk->foto && Storage::exists('public/' . $produk->foto)) {
        Storage::delete('public/' . $produk->foto);
    }

    $produk->delete();

    return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    }
}
