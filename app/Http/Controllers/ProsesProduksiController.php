<?php

namespace App\Http\Controllers;

use DateTimeZone;
use Carbon\Carbon;
use App\Models\Purchase;
use App\Models\RecordBahan;
use Illuminate\Http\Request;
use App\Models\ProsesProduksi;
use Illuminate\Support\Facades\DB;

class ProsesProduksiController extends Controller
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
        $kategori_proses_produksis = DB::table('kategori_proses_produksi')->get();
        $menu_masakans = DB::table('menu_masakan')->get();
        $warehouses = DB::table('warehouses')->get();
        $bahan_dasars = DB::table('bahan_dasars')->get();
        return view('proses_produksi.create-proses-produksi',compact('kategori_proses_produksis','menu_masakans','warehouses','bahan_dasars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       
      

        $menu_masakan_id = $request->menu_masakan_id;

        $masakans = DB::table('food_process')->join('bahan_dasars','food_process.bahan_dasar_id','=','bahan_dasars.id')
                                    ->join('warehouse_stock','food_process.bahan_dasar_id','=','warehouse_stock.bahan_dasar_id')
                                    ->select('food_process.*','bahan_dasars.nama_bahan','warehouse_stock.harga_satuan')
                                    ->where('menu_masakan_id',$menu_masakan_id)->get();

        
        
        foreach ($masakans as $value) {
            $warehouse_update_stock = DB::table('warehouse_stock')->where('warehouse_id',$request->warehouse_id)->where('bahan_dasar_id',$value->bahan_dasar_id)->get();
            foreach ($warehouse_update_stock as $update_stock) {
                $sisa_bahan = $update_stock->stock - ($value->qty * $request->qty);
                DB::table('warehouse_stock')->where('warehouse_id',$request->warehouse_id)
                                            ->where('bahan_dasar_id',$value->bahan_dasar_id)
                                            ->update(['stock'=>$sisa_bahan]);
            }
            RecordBahan::create([
                'kategori_produksi_id' =>$request->kategori_produksi_id,
                'menu_masakan_id' => $value->menu_masakan_id,
                'bahan_dasar_id' => $value->bahan_dasar_id,
                'qty_masakan' => $request->qty,
                'qty_bahan' => $value->qty * $request->qty,
                'price_per_bahan' => $value->harga_satuan,
                'jumlah_cost_per_bahan' => $value->qty * $value->harga_satuan * $request->qty,
                'warehouse_id' => $request->warehouse_id,
            ]);
        }

        // return $masakan;

        ProsesProduksi::create([
            'kategori_produksi_id' => $request->kategori_produksi_id,
            'menu_masakan_id' => $request->menu_masakan_id,
            'jumlah_cost' => $request->jumlah_cost,
            'qty' => $request->qty,
            'warehouse_id' => $request->warehouse_id,
            'created_at' => Carbon::now(new DateTimeZone('Asia/Jakarta')),
        ]);

        // $harga_satuan_output = $request->jumlah_cost / 

            $total_output = 0;
            foreach ($request->outputs as $output) {
                $total_output += $output['qty_output'];
            }
    
            $harga_satuan_output = $request->jumlah_cost / $total_output;
       
            
            foreach ($request->outputs as $output) {
                DB::table('warehouse_stock')->updateOrInsert(
                    [
                        'warehouse_id' => $request->warehouse_id,
                        'bahan_dasar_id' => $output['bahan_dasar_id'],
                    ],
                    [
                        'stock' => DB::raw("stock + {$output['qty_output']}"), // Increment the stock by the given qty
                        'harga_satuan' => DB::raw("CASE WHEN harga_satuan < $harga_satuan_output THEN $harga_satuan_output ELSE harga_satuan END"),
                    ]
                );
            }


        

        return redirect()->route('proses.produksi.index');
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
        ProsesProduksi::find($id)->update([
            'kategori_produksi_id' => $request->kategori_produksi_id,
            'menu_masakan_id' => $request->menu_masakan_id,
            'jumlah_cost' => $request->jumlah_cost,
            'qty' => $request->qty,
            'created_at' => Carbon::now(new DateTimeZone('Asia/Jakarta')),
        ]);

        return redirect()->route('proses.produksi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ProsesProduksi::find($id)->delete();

        return redirect()->route('proses.produksi.index');
    }


    public function rincianResep($id,$qty)
    {

        //  $foods_process = DB::table('food_process')
        //                     ->join('bahan_dasars','food_process.bahan_dasar_id','=','bahan_dasars.id')
        //                     ->join('warehouse_stock', 'food_process.bahan_dasar_id', '=', 'warehouse_stock.bahan_dasar_id')
        //                     ->join('satuan','food_process.satuan_id','=','satuan.id')
        //                     ->where('food_process.menu_masakan_id',$id)
        //                     // ->where('warehouse_stock.warehouse_id', $warehouse_id)
        //                     ->select('food_process.*','bahan_dasars.nama_bahan','satuan.nama_satuan','warehouse_stock.*')
        //                     ->get();

        $foods_process = DB::table('food_process')
                        ->where('food_process.menu_masakan_id',$id)
                        // ->join('warehouse_stock','food_process.bahan_dasar_id','=','warehouse_stock.bahan_dasar_id')
                        ->join('bahan_dasars','food_process.bahan_dasar_id','=','bahan_dasars.id')
                        ->select('food_process.*','bahan_dasars.nama_bahan')
                        // ->orderBy('warehouse_stock.harga_satuan', 'desc')
                        ->get();

        // $foods_process->map(function ($food_process) use ($qty) {
        //     $food_process->jumlah_harga = $food_process->harga_satuan * $food_process->qty;
        //     return $food_process;
        // });
        // return $foods_process;


        return $html = view('proses_produksi.table-rincian-resep',compact('foods_process','qty'))->render();

        return response()->json($html);
    }

    public function stockPurchase($id,$qty,$warehouse_id)
    {
        // $food_stock_warehouses = DB::table('food_process')
        //                         ->join('warehouse_stock', 'food_process.bahan_dasar_id', '=', 'warehouse_stock.bahan_dasar_id')
        //                         ->join('bahan_dasars', 'food_process.bahan_dasar_id', '=', 'bahan_dasars.id')
        //                         ->where('warehouse_stock.warehouse_id', $warehouse_id)
        //                         ->where('food_process.menu_masakan_id', $id)
        //                         ->select('food_process.bahan_dasar_id', 'food_process.qty AS qty_resep', 'warehouse_stock.stock AS qty_stock', 'warehouse_stock.warehouse_id', 'bahan_dasars.nama_bahan')
        //                         ->get();

          $food_stock_warehouses = DB::table('food_process')
                                            ->join('warehouse_stock','food_process.bahan_dasar_id','=','warehouse_stock.bahan_dasar_id')
                                            ->join('bahan_dasars','warehouse_stock.bahan_dasar_id','=','bahan_dasars.id')
                                            ->where('food_process.menu_masakan_id',$id)
                                            ->where('warehouse_stock.warehouse_id',$warehouse_id)
                                            ->select('food_process.*','warehouse_stock.stock','warehouse_stock.harga_satuan','bahan_dasars.nama_bahan')
                                            ->get();

         $foods_process = DB::table('food_process')
                                ->where('food_process.menu_masakan_id',$id)
                                ->get();
        
        // return $food_stock_warehouses;
        // return $foods_process;

        $food_stock_warehouses->map(function ($item) use ($qty) {
            $item->total_qty_used = $item->qty * $qty;
            $item->sisa_stock = $item->stock - $item->total_qty_used;
            $item->harga_used = $item->harga_satuan * $item->total_qty_used;
            // $item->total_biaya_produksi = $item->harga_satuan;
            return $item;
        });

        $total_harga_produksi = $food_stock_warehouses->sum('harga_used');


        $cukup = 'cukup';
        foreach ($food_stock_warehouses as $value) {
            if ($value->sisa_stock < 0) {
                $cukup = 'kurang';
                break;
            }
        }

        // dd($cukup);
        
        $lengkap = (count($food_stock_warehouses) == count($foods_process) ? 'lengkap' : 'kurang');
    

         $html = view('proses_produksi.table-stock-warehouse-purchase',compact('food_stock_warehouses','qty','lengkap','cukup','total_harga_produksi'))->render();

        return response()->json($html);
    }


    public function outputMasakan($i)
    {
        // return $i;
        $bahan_dasars = DB::table('bahan_dasars')->get();
        return view('proses_produksi.table-output-masakan',compact('bahan_dasars','i'))->render();
    }
    
}
