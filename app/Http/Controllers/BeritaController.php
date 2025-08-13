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
    $data = $request->all();
    if ($request->hasFile('foto')) {
        $data['foto'] = $request->file('foto')->store('foto_produk', 'public');
    }
    $produk = Produk::create($data);
    return response()->json($produk);
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

    public function update(Request $request, $id)
{
    $produk = Produk::findOrFail($id);
    $data = $request->all();
    if ($request->hasFile('foto')) {
        $data['foto'] = $request->file('foto')->store('foto_produk', 'public');
    }
    $produk->update($data);
    return response()->json($produk);
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    Produk::findOrFail($id)->delete();
    return response()->json(['status' => 'success']);
}
}
