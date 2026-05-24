<?php

namespace App\Http\Controllers;

use App\Models\Beranda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Beranda = Beranda::all();
        return view('admin.beranda.index', compact('Beranda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.beranda.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'link' => 'required|string',
            'waktu' => 'required|string',
            'level' => 'required|string',
            'foto' => 'required|image',


            // Pastikan ini bukan typo "sesatus"
        ]);

        $data = $request->all();

        $data['foto'] = $request->file('foto')->store('/Beranda', 'public');

        $Beranda = Beranda::create($data);

        if ($Beranda) {
            return redirect()->to('/Beranda')->withSuccess('Data berhasil disimpan'); // Memperbaiki kesalahan pengetikan
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
        $Beranda = Beranda::findOrFail($id);
        return view('admin.beranda.edit', compact('Beranda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $Beranda = Beranda::findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'link' => 'required|string',
            'foto' => 'required|image',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($Beranda->foto) {
                Storage::disk('public')->delete($Beranda->foto);
            }

            // Simpan foto baru
            $data['foto'] = $request->file('foto')->store('Beranda', 'public');
        }

        $Beranda->update($data);

        if ($Beranda) {
            return redirect()->to('/Beranda')->withSucces('Data berhasil di update');
        } else {
            return back()->withInput()->withErrors('Data buku gagal di update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beranda $Beranda)
    {
        //
        $Beranda->delete();
        if ($Beranda) {
            return redirect()->to('/Beranda')->withSuccess('delete success');
        } else {
            return back()->withInput()->withErrors('Insert Falied');
        }
    }
}
