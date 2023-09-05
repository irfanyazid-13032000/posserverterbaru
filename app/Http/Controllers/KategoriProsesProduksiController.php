<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriProsesProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori_proses_produksis = DB::table('kategori_proses_produksi')->get();
        // return $kategori_proses_produksis;
        return view('kategori_proses_produksi.index-kategori-proses-produksi',compact('kategori_proses_produksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori_proses_produksi.create-kategori-proses-produksi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('kategori_proses_produksi')->insert([
            'nama_kategori' => $request->nama_kategori
        ]);
        return redirect()->route('kategori.proses.produksi.index');
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
    public function edit(string $id)
    {
        $kategori_proses_produksi = DB::table('kategori_proses_produksi')->where('id',$id)->get()->first();
        // return $kategori_proses_produksi;
        return view('kategori_proses_produksi.edit-kategori-proses-produksi',compact('kategori_proses_produksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('kategori_proses_produksi')->where('id',$id)->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('kategori.proses.produksi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('kategori_proses_produksi')->where('id',$id)->delete();

        return redirect()->route('kategori.proses.produksi.index');
    }
}
