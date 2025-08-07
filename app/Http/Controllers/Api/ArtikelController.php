<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Exception;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function GetProduct()
    {
        $data = null;
        $message = '';
        $responseCode = Response::HTTP_BAD_REQUEST;

        DB::beginTransaction();
        try {
            $data = Produk::all();

            // Buat URL lengkap untuk foto
            foreach ($data as $item) {
                if ($item->foto) {
                    $item->foto = asset('storage/foto_produk/' . $item->foto);
                }
            }

            DB::commit();
            $message = 'Data produk berhasil diambil.';
            $responseCode = Response::HTTP_OK;
        } catch (QueryException $e) {
            DB::rollBack();
            $message = 'Terjadi kesalahan pada query. ' . $e->getMessage();
            $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        } catch (Exception $e) {
            DB::rollBack();
            $message = 'Terjadi kesalahan. ' . $e->getMessage();
            $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        } finally {
            return response()->json([
                'status_code' => $responseCode,
                'message' => $message,
                'response' => $data,
            ], $responseCode);
        }
    }

    public function CreateProduct(Request $request)
    {
        $data = null;
        $message = '';
        $responseCode = Response::HTTP_BAD_REQUEST;

        DB::beginTransaction();
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'jumlah' => 'required|integer',
                'harga' => 'required|integer',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'tanggal_kadaluarsa' => 'required|date',
            ]);

            $produk = new Produk();
            $produk->nama = $request->nama;
            $produk->jumlah = $request->jumlah;
            $produk->harga = $request->harga;
            $produk->tanggal_kadaluarsa = $request->tanggal_kadaluarsa;

            if ($request->hasFile('foto')) {
                $filename = time() . '_' . $request->file('foto')->getClientOriginalName();
                $request->file('foto')->storeAs('public/foto_produk', $filename);
                $produk->foto = $filename; // Simpan nama file di database
            }

            $produk->save();

            // Tampilkan URL lengkap foto di response
            if ($produk->foto) {
                $produk->foto = asset('storage/foto_produk/' . $produk->foto);
            }

            DB::commit();
            $message = 'Produk berhasil dibuat.';
            $data = $produk;
            $responseCode = Response::HTTP_CREATED;
        } catch (Exception $e) {
            DB::rollBack();
            $message = 'Gagal membuat produk. ' . $e->getMessage();
            $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        } finally {
            return response()->json([
                'status_code' => $responseCode,
                'message' => $message,
                'response' => $data,
            ], $responseCode);
        }
    }

    public function UpdateProduct(Request $request, $id)
    {
        $data = null;
        $message = '';
        $responseCode = Response::HTTP_BAD_REQUEST;

        DB::beginTransaction();
        try {
            $produk = Produk::findOrFail($id);

            $produk->nama = $request->nama ?? $produk->nama;
            $produk->jumlah = $request->jumlah ?? $produk->jumlah;
            $produk->harga = $request->harga ?? $produk->harga;
            $produk->tanggal_kadaluarsa = $request->tanggal_kadaluarsa ?? $produk->tanggal_kadaluarsa;

            if ($request->hasFile('foto')) {
                // Hapus file lama jika ada
                if ($produk->foto && Storage::exists('public/foto_produk/' . $produk->foto)) {
                    Storage::delete('public/foto_produk/' . $produk->foto);
                }

                $filename = time() . '_' . $request->file('foto')->getClientOriginalName();
                $request->file('foto')->storeAs('public/foto_produk', $filename);
                $produk->foto = $filename;
            }

            $produk->save();

            if ($produk->foto) {
                $produk->foto = asset('storage/foto_produk/' . $produk->foto);
            }

            DB::commit();
            $message = 'Produk berhasil diperbarui.';
            $data = $produk;
            $responseCode = Response::HTTP_OK;
        } catch (Exception $e) {
            DB::rollBack();
            $message = 'Gagal memperbarui produk. ' . $e->getMessage();
            $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        } finally {
            return response()->json([
                'status_code' => $responseCode,
                'message' => $message,
                'response' => $data,
            ], $responseCode);
        }
    }

    public function DeleteProduct($id)
    {
        $data = null;
        $message = '';
        $responseCode = Response::HTTP_BAD_REQUEST;

        DB::beginTransaction();
        try {
            $produk = Produk::findOrFail($id);

            // Hapus foto dari storage jika ada
            if ($produk->foto && Storage::exists('public/foto_produk/' . $produk->foto)) {
                Storage::delete('public/foto_produk/' . $produk->foto);
            }

            $produk->delete();

            DB::commit();
            $message = 'Produk berhasil dihapus.';
            $responseCode = Response::HTTP_OK;
        } catch (Exception $e) {
            DB::rollBack();
            $message = 'Gagal menghapus produk. ' . $e->getMessage();
            $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        } finally {
            return response()->json([
                'status_code' => $responseCode,
                'message' => $message,
                'response' => $data,
            ], $responseCode);
        }
    }
}