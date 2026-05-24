<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Tampilkan daftar data blog.
     */
    public function index()
    {
        $Blog = Blog::all();
        return view('admin.blog.index', compact('Blog'));
    }

    /**
     * Tampilkan form untuk membuat blog baru.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Simpan data blog baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'foto'      => 'required|image',

        ]);

        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('Blog', 'public');

        $Blog = Blog::create($data);

        if ($Blog) {
            return redirect()->to('/Blog')->withSuccess('Data berhasil disimpan');
        } else {
            return back()->withErrors('Data gagal ditambahkan');
        }
    }

    /**
     * Tampilkan form edit data blog.
     */
    public function edit($id)
    {
        $Blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('Blog'));
    }

    /**
     * Update data blog berdasarkan ID.
     */
    public function update(Request $request, $id)
    {
        $Blog = Blog::findOrFail($id);

        $request->validate([
            'judul'     => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'foto'      => 'nullable|image',

        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($Blog->foto) {
                Storage::disk('public')->delete($Blog->foto);
            }

            // Simpan foto baru
            $data['foto'] = $request->file('foto')->store('Blog', 'public');
        }

        $Blog->update($data);

        return redirect('/Blog')->with('success', 'Data berhasil diupdate');
    }


    /**
     * Hapus data blog berdasarkan ID.
     */
    public function destroy($id)
    {
        $Blog = Blog::findOrFail($id);

        // Hapus file foto dari storage
        if ($Blog->foto) {
            Storage::disk('public')->delete($Blog->foto);
        }

        $Blog->delete();

        return redirect()->to('/Blog')->withSuccess('Data berhasil dihapus');
    }
}
