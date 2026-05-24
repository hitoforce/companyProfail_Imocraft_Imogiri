<?php

namespace App\Http\Controllers;


use App\Models\Dswisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DswisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Dswisata = Dswisata::all();
        return view('admin.dswisata.index',compact('Dswisata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.dswisata.create');
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
        $data['foto'] = $request->file('foto')->store('Dswisata', 'public');

        $Dswisata = Dswisata::create($data);

        if ($Dswisata) {
            return redirect()->to('/Dswisata')->withSuccess('Data berhasil disimpan');
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
    public function edit( $id)
    {
        $Dswisata = Dswisata::findOrFail($id);

        return view('admin.Dswisata.edit', compact('Dswisata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
  {
        $Dswisata = Dswisata::findOrFail($id);

        $request->validate([
            'nama'     => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'foto'      => 'nullable|image',

        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($Dswisata->foto) {
                Storage::disk('public')->delete($Dswisata->foto);
            }

            // Simpan foto baru
            $data['foto'] = $request->file('foto')->store('Dswisata', 'public');
        }

        $Dswisata->update($data);

        return redirect('/Dswisata')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dswisata $Dswisata)
   {
        //
        $Dswisata->delete();
        if ($Dswisata) {
            return redirect()->to('/Dswisata')->withSuccess('delete success');
        } else {
            return back()->withInput()->withErrors('Insert Falied');
        }
    }
}
