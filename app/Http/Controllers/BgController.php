<?php

namespace App\Http\Controllers;

use App\Models\Beranda;
use App\Models\Bg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BgController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Bg = Bg::all();
        return view('admin.bg.index', compact('Bg'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.bg.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'foto' => 'required|image',


            // Pastikan ini bukan typo "sesatus"
        ]);

        $data = $request->all();

        $data['foto'] = $request->file('foto')->store('/Bg', 'public');

        $Bg = Bg::create($data);

        if ($Bg) {
            return redirect()->to('/Bg')->withSuccess('Data berhasil disimpan'); // Memperbaiki kesalahan pengetikan
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
        $Bg = Bg::findOrFail($id);
        return view('admin.bg.edit', compact('Bg'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $Bg = Bg::findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'foto' => 'required|image',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($Bg->foto) {
                Storage::disk('public')->delete($Bg->foto);
            }

            // Simpan foto baru
            $data['foto'] = $request->file('foto')->store('Bg', 'public');
        }

        $Bg->update($data);

        if ($Bg) {
            return redirect()->to('/Bg')->withSucces('Data berhasil di update');
        } else {
            return back()->withInput()->withErrors('Data buku gagal di update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bg $Bg)
     {
        //
        $Bg->delete();
        if ($Bg) {
            return redirect()->to('/Bg')->withSuccess('delete success');
        } else {
            return back()->withInput()->withErrors('Insert Falied');
        }
    }
}
