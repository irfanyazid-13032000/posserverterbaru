<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Models\ProsesProduksi;
use App\Models\WarehouseRecord;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proses_produksis = ProsesProduksi::join('kategori_proses_produksi','proses_produksi.kategori_produksi_id','=','kategori_proses_produksi.id')
                                ->join('menu_masakan','proses_produksi.menu_masakan_id','=','menu_masakan.id')
                                ->join('warehouses','proses_produksi.warehouse_id','=','warehouses.id')
                                ->select('proses_produksi.*','kategori_proses_produksi.nama_kategori','menu_masakan.nama_menu','warehouses.name_warehouse')
                                ->get();
        // return $proses_produksis;
        return view('proses_produksi.index-proses-produksi',compact('proses_produksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warehouses = Warehouse::all();
        $kategori_bahans = DB::table('kategori_bahan')->get();
        $bahans = DB::table('bahan_dasars')->get();
        $satuans = DB::table('satuan')->get();
        $vendors = DB::table('vendors')->get();
        // return $kategori_bahans;
        return view('purchase.create-purchase',compact('warehouses','kategori_bahans','bahans','satuans','vendors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Purchase::create([
            'warehouse_id' => $request->warehouse_id,
            'no_invoice' => $request->no_invoice,
            'kategori_bahan_id' => $request->kategori_bahan_id,
            'bahan_dasar_id' => $request->bahan_dasar_id,
            'satuan_id' => $request->satuan_id,
            'qty' => $request->qty,
            'harga_satuan' => $request->harga_satuan,
            'jumlah_harga' => $request->jumlah_harga,
            'vendor_id' => $request->vendor_id,
        ]);

        $warehouse_id = $request->warehouse_id;
        $bahan_dasar_id = $request->bahan_dasar_id;
        $qty = $request->qty;
        $hargaSatuan = $request->harga_satuan;
    
        DB::table('warehouse_stock')->updateOrInsert(
            [
                'warehouse_id' => $warehouse_id,
                'bahan_dasar_id' => $bahan_dasar_id,
            ],
            [
                'stock' => DB::raw("stock + $qty"), // Increment the stock by the given qty
                'harga_satuan' => DB::raw("CASE WHEN harga_satuan < $hargaSatuan THEN $hargaSatuan ELSE harga_satuan END"),
            ]
        );

        WarehouseRecord::create([
            'warehouse_id' => $warehouse_id,
            'stock' => $qty,
            'bahan_dasar_id' => $bahan_dasar_id,
            'harga_satuan' => $request->harga_satuan,
        ]);

        return redirect()->route('purchase.index');
        
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
        $kategori_proses_produksis = DB::table('kategori_proses_produksi')->get();
        $menu_masakans = DB::table('menu_masakan')->get();
        $warehouses = DB::table('warehouses')->get();
        $proses_produksi = ProsesProduksi::find($id);
        // return $proses_produksi;
        return view('proses_produksi.edit-proses-produksi',compact('kategori_proses_produksis','menu_masakans','proses_produksi','warehouses','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $purchase = Purchase::find($id);
        $purchase->update([
            'warehouse_id' => $request->warehouse_id,
            'kategori_bahan_id' => $request->kategori_bahan_id,
            'bahan_dasar_id' => $request->bahan_dasar_id,
            'satuan_id' => $request->satuan_id,
            'qty' => $request->qty,
            'harga_satuan' => $request->harga_satuan,
            'jumlah_harga' => $request->jumlah_harga,
            'vendor_id' => $request->vendor_id,
        ]);


        return redirect()->route('purchase.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Purchase::find($id)->delete();

        return redirect()->route('purchase.index');
    }
}
