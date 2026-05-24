<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $User = User::all();
        return view('admin.User.index', compact('User'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required',

        ]);

        $User = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),

        ]);

        if ($User) {
            return redirect()->to('/User')->with('success', 'Data berhasil disimpan');
        } else {
            return back()->withErrors('Data user gagal ditambah');
        }
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,

        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil diupdate');
    }

    public function destroy(User $User)
    {
        //
        $User->delete();
        if ($User) {
            return redirect()->to('/User')->withSuccess('delete success');
        } else {
            return back()->withInput()->withErrors('Insert Falied');
        }
    }
}
