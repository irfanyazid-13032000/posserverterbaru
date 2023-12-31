<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Warehouse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\WarehouseRecord;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = Purchase::join('warehouses','purchases.warehouse_id','=','warehouses.id')
                                    ->join('bahan_dasars','purchases.bahan_dasar_id','=','bahan_dasars.id')
                                    ->join('kategori_bahan','bahan_dasars.kategori_bahan_id','=','kategori_bahan.id')
                                    ->join('satuan','bahan_dasars.satuan_id','=','satuan.id')
                                    ->join('vendors','purchases.vendor_id','=','vendors.id')
                                    ->select('purchases.*','warehouses.name_warehouse','kategori_bahan.nama_kategori_bahan','bahan_dasars.nama_bahan','satuan.nama_satuan','vendors.name_vendor')
                                    ->get();
        // return $purchases;
        return view('purchase.index-purchase',compact('purchases'));
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
        $no_invoice = Str::random(20);
        // return $kategori_bahans;
        return view('purchase.create-purchase',compact('warehouses','kategori_bahans','bahans','satuans','vendors','no_invoice'));
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        foreach ($request->bahan_purchase as $bahan) {
            Purchase::create([
                'warehouse_id' => $request->warehouse_id,
                'no_invoice' => $request->no_invoice,
                'vendor_id' => $request->vendor_id,
                'bahan_dasar_id' => $bahan['bahan_dasar_id'],
                'qty' => $bahan['qty'],
                'harga_satuan' => $bahan['harga_satuan'],
                'harga_acuan' => $bahan['harga_acuan'],
                'selisih_harga' => $bahan['selisih_harga'],
                'jumlah_harga' => $bahan['jumlah_harga'],
            ]);

            $qty = $bahan['qty'];
            $hargaSatuan = $bahan['harga_satuan'];


            DB::table('warehouse_stock')->updateOrInsert(
                [
                    'warehouse_id' => $request->warehouse_id,
                    'bahan_dasar_id' => $bahan['bahan_dasar_id'],
                ],
                [
                    'stock' => DB::raw("stock + $qty"), // Increment the stock by the given qty
                    'harga_satuan' => DB::raw("CASE WHEN harga_satuan < $hargaSatuan THEN $hargaSatuan ELSE harga_satuan END"),
                ]
            );



            WarehouseRecord::create([
                'warehouse_id' => $request->warehouse_id,
                'stock' => $qty,
                'bahan_dasar_id' => $bahan['bahan_dasar_id'],
                'harga_satuan' => $bahan['harga_satuan'],
            ]);
            
            
            
        }


        
        return redirect()->route('purchase.index');
    }
     
    
    
    public function storebackup(Request $request)
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
            'selisih_harga' => $request->selisih_harga,
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
        $warehouses = Warehouse::all();
        $kategori_bahans = DB::table('kategori_bahan')->get();
        $bahans = DB::table('bahan_dasars')->get();
        $satuans = DB::table('satuan')->get();
        $vendors = DB::table('vendors')->get();
        $purchase = Purchase::join('kategori_bahan','purchases.kategori_bahan_id','=','kategori_bahan.id')
                            ->join('satuan','purchases.satuan_id','=','satuan.id')
                            ->select('purchases.*','kategori_bahan.nama_kategori_bahan','satuan.nama_satuan')
                            ->where('purchases.id',$id)
                            ->get()->first();
        // return $purchase;
        return view('purchase.edit-purchase',compact('warehouses','kategori_bahans','bahans','satuans','vendors','purchase'));
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


    public function tableAwal($i)
    {
        $bahan_dasars = DB::table('bahan_dasars')->get();
        return view('purchase.table-awal-bahan-purchase',compact('i','bahan_dasars'));
    }

    public function tableTambahan($i)
    {
        $bahan_dasars = DB::table('bahan_dasars')->get();
        return view('purchase.table-tambahan-bahan-purchase',compact('i','bahan_dasars'));
    }

    public function dataBahanDasar($bahan_dasar_id)
    {
        $bahan_dasar = DB::table('bahan_dasars')
                            ->join('satuan','bahan_dasars.satuan_id','=','satuan.id')
                            ->join('kategori_bahan','bahan_dasars.kategori_bahan_id','=','kategori_bahan.id')
                            ->select('bahan_dasars.*','satuan.nama_satuan','kategori_bahan.nama_kategori_bahan')
                            ->where('bahan_dasars.id',$bahan_dasar_id)->first();
        return $bahan_dasar;
    }
}
