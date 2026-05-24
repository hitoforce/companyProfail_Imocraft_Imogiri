<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Galery = Galery::all();
        return view('admin.galery.index', compact('Galery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.galery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'foto'      => 'required|image',

        ]);

        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('Galery', 'public');

        $Galery = Galery::create($data);

        if ($Galery) {
            return redirect()->to('/Galery')->withSuccess('Data berhasil disimpan');
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
        $Galery = Galery::findOrFail($id);

        return view('admin.galery.edit', compact('Galery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $Galery = Galery::findOrFail($id);

        $request->validate([
            'nama'     => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'foto'      => 'nullable|image',

        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($Galery->foto) {
                Storage::disk('public')->delete($Galery->foto);
            }

            // Simpan foto baru
            $data['foto'] = $request->file('foto')->store('Galery', 'public');
        }

        $Galery->update($data);

        return redirect('/Galery')->with('success', 'Data berhasil diupdate');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galery $Galery)
    {
        //
        $Galery->delete();
        if ($Galery) {
            return redirect()->to('/Galery')->withSuccess('delete success');
        } else {
            return back()->withInput()->withErrors('Insert Falied');
        }
    }
}
