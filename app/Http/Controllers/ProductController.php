<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Product = Product::all();
        return view('admin.product.index', compact('Product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'harga' => 'required|string',
            'stok' => 'required|string',
            'level' => 'required|string',
            'foto' => 'required|image',


            // Pastikan ini bukan typo "sesatus"
        ]);

        $data = $request->all();

        $data['foto'] = $request->file('foto')->store('/Product', 'public');

        $Product = Product::create($data);

        if ($Product) {
            return redirect()->to('/Product')->withSuccess('Data berhasil disimpan'); // Memperbaiki kesalahan pengetikan
        } else {
            return back()->withErrors('Data gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Product = Product::findOrFail($id);
        return view('admin.product.edit', compact('Product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $Product = Product::findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'harga' => 'required|string',
            'stok' => 'required|string',
            'level' => 'required|string',
            'foto' => 'required|image',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($Product->foto) {
                Storage::disk('public')->delete($Product->foto);
            }

            // Simpan foto baru
            $data['foto'] = $request->file('foto')->store('Product', 'public');
        }

        $Product->update($data);

        if ($Product) {
            return redirect()->to('/Product')->withSucces('Data berhasil di update');
        } else {
            return back()->withInput()->withErrors('Data buku gagal di update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $Product)
    {
        //
        $Product->delete();
        if ($Product) {
            return redirect()->to('/Product')->withSuccess('delete success');
        } else {
            return back()->withInput()->withErrors('Insert Falied');
        }
    }
}
