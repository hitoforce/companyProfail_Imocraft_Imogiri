<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Beranda;
use App\Models\Bg;
use App\Models\Blog;
use App\Models\Dswisata;
use App\Models\Galery;
use App\Models\Product;
use Illuminate\Http\Request;

class BelakangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Galery = Galery::all();
        $About = About::all();
        $Beranda = Beranda::all();
        $Blog = Blog::all();
        $Bg = Bg::all();
        $Product = Product::all();
        return view('belakang.layout.index', compact('Bg', 'Blog', 'Beranda', 'About','Product','Galery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function detail()
    {
        //
        $Blog = Blog::all();
        return view('belakang.layout.detail', compact('Blog'));
    }

    /**
     * Store a newly created resource in storage.
     */
  public function wisata()
    {
        //
        $Dswisata = Dswisata::all();
        return view('belakang.layout.dswisata', compact('Dswisata'));
    }

    /**
     * Display the specified resource.
     */

    public function belanja()
    {
        //
        $Product = Product::all();
        $Bg = Bg::all();
        return view('belakang.layout.belanja', compact('Bg', 'Product'));
    }
     public function dtwisata()
    {
        //
        $Dswisata = Dswisata::all();
        return view('belakang.layout.dtlwisata', compact('Dswisata'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
