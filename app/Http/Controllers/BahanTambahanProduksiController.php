<?php

namespace App\Http\Controllers;

use DateTimeZone;
use Carbon\Carbon;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BahanTambahanProduksi;

class BahanTambahanProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bahan_tambahan_produksis = BahanTambahanProduksi::join('bahan_dasars','bahan_tambahan_produksi.bahan_dasar_id','=','bahan_dasars.id')
                                                ->join('warehouses','bahan_tambahan_produksi.warehouse_id','=','warehouses.id')
                                                ->select('bahan_tambahan_produksi.*','bahan_dasars.nama_bahan','warehouses.name_warehouse')
                                                ->get();
        // return $bahan_tambahan_produksis;
        // return $bahan_tambahan_produksis;
        return view('bahan_tambahan_produksi.index-bahan-tambahan-produksi',compact('bahan_tambahan_produksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bahan_dasars = DB::table('bahan_dan_kategori')->where('kategori_bahan_id',14)->get();
        $warehouses = DB::table('warehouses')->get();
        return view('bahan_tambahan_produksi.create-bahan-tambahan-produksi',compact('bahan_dasars','warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        BahanTambahanProduksi::create([
            'bahan_dasar_id' => $request->bahan_dasar_id,
            'warehouse_id' => $request->warehouse_id,
            'harga_satuan' => $request->harga_satuan,
            'qty' => $request->qty,
            'jumlah_harga' => $request->jumlah_harga,
            'start_pemakaian' => Carbon::now(new DateTimeZone('Asia/Jakarta')),
            'created_at' => Carbon::now(new DateTimeZone('Asia/Jakarta')),
        ]);

         // update stock warehouse yang ada di warehouse_stock
        DB::table('warehouse_stock')
                ->where('bahan_dasar_id', $request->bahan_dasar_id)
                ->where('warehouse_id', $request->warehouse_id)
                ->update([
                    'stock' => $request->qty_warehouse
                ]);


        return redirect()->route('bahan.tambahan.produksi.index');
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
        $bahan_tambahan_produksi = BahanTambahanProduksi::find($id);
        $bahan_dasars = DB::table('bahan_dan_kategori')->where('kategori_bahan_id',14)->get();
        $warehouses = DB::table('warehouses')->get();
        return view('bahan_tambahan_produksi.edit-bahan-tambahan-produksi',compact('bahan_tambahan_produksi','bahan_dasars','warehouses','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        BahanTambahanProduksi::find($id)->update([
            'bahan_dasar_id' => $request->bahan_dasar_id,
            'warehouse_id' => $request->warehouse_id,
            'harga_satuan' => $request->harga_satuan,
            'qty' => $request->qty,
            'jumlah_harga' => $request->jumlah_harga,
        ]);

          // update stock warehouse yang ada di warehouse_stock
        DB::table('warehouse_stock')
            ->where('bahan_dasar_id', $request->bahan_dasar_id)
            ->where('warehouse_id', $request->warehouse_id)
            ->update([
                'stock' => $request->qty_warehouse
            ]);


        return redirect()->route('bahan.tambahan.produksi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        BahanTambahanProduksi::find($id)->delete();

        return redirect()->route('bahan.tambahan.produksi.index');
    }
}
