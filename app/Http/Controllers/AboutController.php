<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $About = About::all();
        return view('admin.about.index', compact('About'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.about.create');
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

        $data['foto'] = $request->file('foto')->store('/About', 'public');

        $About = About::create($data);

        if ($About) {
            return redirect()->to('/About')->withSuccess('Data berhasil disimpan'); // Memperbaiki kesalahan pengetikan
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
        $About = About::findOrFail($id); // Ambil data berdasarkan ID

        return view('admin.about.edit', compact('About')); // Pastikan pakai lowercase $about
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $About = About::findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'foto' => 'required|image',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($About->foto) {
                Storage::disk('public')->delete($About->foto);
            }

            // Simpan foto baru
            $data['foto'] = $request->file('foto')->store('About', 'public');
        }

        $About->update($data);

        if ($About) {
            return redirect()->to('/About')->withSucces('Data berhasil di update');
        } else {
            return back()->withInput()->withErrors('Data buku gagal di update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $About)
    {
        //
        $About->delete();
        if ($About) {
            return redirect()->to('/About')->withSuccess('delete success');
        } else {
            return back()->withInput()->withErrors('Insert Falied');
        }
    }
}
