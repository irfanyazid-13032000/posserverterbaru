<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $satuans = DB::table('satuan')->get();
        return view('satuan.index-satuan',compact('satuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('satuan.create-satuan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('satuan')->insert([
            'nama_satuan' => $request->nama_satuan
        ]);
        return redirect()->route('satuan.index');
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
        $satuan = DB::table('satuan')->where('id',$id)->get()->first();
        return view('satuan.edit-satuan',compact('satuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('satuan')->where('id',$id)->update(['nama_satuan'=>$request->nama_satuan]);
        return redirect()->route('satuan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('satuan')->where('id',$id)->delete();
        return redirect()->route('satuan.index');
    }
}
