<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Models\WarehouseRecord;

class WarehouseRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_warehouse)
    {
        $warehouse = Warehouse::find($id_warehouse);
        $warehouse_records = WarehouseRecord::where('warehouse_id',$id_warehouse)
                                            ->join('bahan_dasars','warehouse_record.bahan_dasar_id','=','bahan_dasars.id')
                                            ->select('warehouse_record.*','bahan_dasars.nama_bahan')
                                            ->get();
        return view('record_warehouse.index-record-warehouse',compact('warehouse_records','warehouse'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
