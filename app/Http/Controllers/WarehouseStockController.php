<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarehouseStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_warehouse)
    {
        $warehouse = Warehouse::find($id_warehouse);
        $warehouse_stocks = DB::table('warehouse_stock')
                                ->join('bahan_dasars','warehouse_stock.bahan_dasar_id','=','bahan_dasars.id')
                                ->join('satuan','bahan_dasars.satuan_id','=','satuan.id')
                                ->select('warehouse_stock.*','bahan_dasars.nama_bahan','satuan.nama_satuan')
                                ->where('warehouse_stock.warehouse_id',$id_warehouse)
                                ->get();
        // return $warehouse_stocks;
        return view('stock-warehouse.index-stock-warehouse',compact('id_warehouse','warehouse','warehouse_stocks'));
    }

    public function raw($id_warehouse)
    {
        $warehouse = Warehouse::find($id_warehouse);
        $raw_foods = DB::table('raw')
                        ->join('bahan_baku','raw.kode_bahan','bahan_baku.kode_bahan')
                        ->where('warehouse_id',$id_warehouse)
                        ->select('raw.*','bahan_baku.nama_bahan')
                        ->get();
        return view('stock-warehouse.raw.raw-stock-warehouse',compact('warehouse','raw_foods'));
    }

    public function rawDatatable($id_warehouse)
    {
        // ini data hasil query
        $raw_foods = DB::table('raw')
                    ->join('bahan_baku','raw.kode_bahan','bahan_baku.kode_bahan')
                    ->where('warehouse_id',$id_warehouse)
                    ->select('raw.*','bahan_baku.nama_bahan','bahan_baku.unit')
                    ->get();

        // ini data mofidikasi
        $raw_foods = $raw_foods->map(function ($item, $index) use ($id_warehouse) {
            $item->DT_RowIndex = $index + 1;
            $item->action = '<a href="'.route('warehouse.stock.raw.edit',['id_warehouse'=>$id_warehouse,'kode_bahan'=>$item->kode_bahan]).'" class="btn btn-primary">edit</a> <a href="'.route('warehouse.stock.raw.delete',['id_warehouse'=>$id_warehouse,'kode_bahan'=>$item->kode_bahan]).'" class="btn btn-danger">delete</a>';
            $item->price = 'Rp. ' . number_format($item->price);
            $item->total_price = 'Rp. ' . number_format($item->total_price);
            return $item;
        });
    return datatables()->of($raw_foods)->toJson();
    }

    public function rawEdit($id_warehouse,$kode_bahan)
    {
        $raw_food = DB::table('raw')
                    ->join('bahan_baku','raw.kode_bahan','=','bahan_baku.kode_bahan')
                    ->where('raw.kode_bahan',$kode_bahan)
                    ->where('raw.warehouse_id',$id_warehouse)
                    ->get()
                    ->first();
        $warehouse = Warehouse::find($id_warehouse);
        // return $raw_food;
        // return [$id_warehouse,$kode_bahan];
        return view('stock-warehouse.raw.raw-edit-stock-warehouse',compact('raw_food','warehouse'));
    }

    public function rawUpdate(Request $request, $id_warehouse, $kode_bahan)
    {
        DB::table('raw')
                    ->where('warehouse_id',$id_warehouse)
                    ->where('kode_bahan',$kode_bahan)
                    ->update([
                        'price' => $request->price,
                        'qty' => $request->qty,
                        'total_price' => $request->total_price,
        ]);

        return redirect()->route('warehouse.stock.raw',['id_warehouse'=>$id_warehouse]);

    
    }

    public function rawDelete($id_warehouse, $kode_bahan)
    {
        DB::table('raw')
                    ->where('warehouse_id',$id_warehouse)
                    ->where('kode_bahan',$kode_bahan)
                    ->delete();

        return redirect()->route('warehouse.stock.raw',['id_warehouse'=>$id_warehouse]);
    
    }

    public function halfCooked($id_warehouse)
    {
        $warehouse = Warehouse::find($id_warehouse);
        $half_cooked_foods = DB::table('half_cooked')
                        ->join('bahan_baku','half_cooked.kode_bahan','bahan_baku.kode_bahan')
                        ->where('warehouse_id',$id_warehouse)
                        ->select('half_cooked.*','bahan_baku.nama_bahan')
                        ->get();
        // return $half_cooked_foods;
        return view('stock-warehouse.half-cooked.half-cooked-stock-warehouse',compact('warehouse','half_cooked_foods'));
    }

    public function halfCookedDatatable($id_warehouse)
    {
        // ini data hasil query
        $half_cooked_foods = DB::table('half_cooked')
                    ->join('bahan_baku','half_cooked.kode_bahan','bahan_baku.kode_bahan')
                    ->where('warehouse_id',$id_warehouse)
                    ->select('half_cooked.*','bahan_baku.nama_bahan','bahan_baku.unit')
                    ->get();

        // ini data mofidikasi
        $half_cooked_foods = $half_cooked_foods->map(function ($item, $index) use ($id_warehouse) {
            $item->DT_RowIndex = $index + 1;
            $item->action = '<a href="'.route('warehouse.stock.raw.edit',['id_warehouse'=>$id_warehouse,'kode_bahan'=>$item->kode_bahan]).'" class="btn btn-primary">edit</a> <a href="'.route('warehouse.stock.raw.delete',['id_warehouse'=>$id_warehouse,'kode_bahan'=>$item->kode_bahan]).'" class="btn btn-danger">delete</a>';
            $item->price = 'Rp. ' . number_format($item->price);
            $item->total_price = 'Rp. ' . number_format($item->total_price);
            return $item;
        });
    return datatables()->of($half_cooked_foods)->toJson();
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create($id_warehouse)
    {
        // $products = Product::all();
        return view('stock-warehouse.create-stock-warehouse',compact('id_warehouse'));
    }

    public function rawCreate($id_warehouse)
    {
        $warehouse = Warehouse::find($id_warehouse);
        $bahan_bakus = DB::table('bahan_baku')->where('status','mentah')->get();
        // return $bahan_bakus;

        return view('stock-warehouse.raw.raw-create-stock-warehouse',compact('warehouse','bahan_bakus'));
    }

    public function rawStore(Request $request, $id_warehouse)
    {

        // Validasi input
        $request->validate([
            // 'kode_bahan' => 'required|unique:raw,kode_bahan,NULL,id,warehouse_id,' . $id_warehouse,
            'price' => 'required|numeric',
            'qty' => 'required|integer',
            'total_price' => 'required|numeric',
        ]);

        // Pastikan data unik
        $existingRecord = DB::table('raw')
            ->where('kode_bahan', $request->kode_bahan)
            ->where('warehouse_id', $id_warehouse)
            ->first();

        if ($existingRecord) {
            // Kode_bahan dan warehouse_id sudah ada kombinasi yang sama
            // Lakukan tindakan yang sesuai, misalnya kirim pesan error
            return redirect()->back()->with('duplikat', 'kode bahan yg di input sudah ada pada warehouse ini.');
        }

        DB::table('raw')->insert([
            'kode_bahan' => $request->kode_bahan,
            'price' => $request->price,
            'qty' => $request->qty,
            'total_price' => $request->total_price,
            'warehouse_id' => $id_warehouse,
        ]);

        return redirect()->route('warehouse.stock.raw',['id_warehouse'=>$id_warehouse]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id_warehouse)
    {

        // return $request;
       
        DB::table('warehouse_stock')->insert([
            'code_ingredient' => $request->code_ingredient,
            'warehouse_id' => $id_warehouse,
            'name_ingredient' => $request->name_ingredient,
            'stock' => $request->stock,
            'unit' => $request->unit,
            'price_per_unit' => $request->price_per_unit,
            'total_price' => $request->total_price,
        ]);

         return redirect()->route('warehouse.stock.raw',['id_warehouse'=>$id_warehouse]);
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
    public function edit(string $id,$stock_id)
    {
        $warehouse_stock = DB::table('warehouse_stock')->where('warehouse_stock.id',$stock_id)->get()->first();
        // return $warehouse_stock;
        return view('stock-warehouse.edit-stock-warehouse',compact('warehouse_stock','id','stock_id'));
    }


    public function warehouseData($code)
    {
        $warehouse_stock = DB::table('warehouse_stock')->where('code_ingredient',$code)->get()->first();
        return $warehouse_stock;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_warehouse, string $stock_id)
    {
        // return $stock_id;

        DB::table('warehouse_stock')->where('id',$stock_id)->update([
            'code_ingredient' => $request->code_ingredient,
            'name_ingredient' => $request->name_ingredient,
            'stock' => $request->stock,
            'unit' => $request->unit,
            'price_per_unit' => $request->price_per_unit,
            'total_price' => $request->total_price,
        ]);

        return redirect()->route('warehouse.stock.index',['id_warehouse'=>$id_warehouse]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_warehouse, $stock_id)
    {
        DB::table('warehouse_stock')
        ->where('id',$stock_id)
        ->where('warehouse_id',$id_warehouse)
        ->delete();


        return redirect()->route('warehouse.stock.index',['id_warehouse'=>$id_warehouse]);
    }
}
