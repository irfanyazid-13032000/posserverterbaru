<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouses = Warehouse::all();
        return view('warehouse.index-warehouse',compact('warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('warehouse.create-warehouse');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        Warehouse::create([
            'name_warehouse' => $request->name_warehouse,
            'address' => $request->address,
            'pic' => $request->pic,
            'contact' => $request->contact,
        ]);

        return redirect()->route('warehouse.index');
    }

    public function makananPokok($i)
    {

        $html = view('warehouse.makanan-pokok',compact('i'))->render();

        return response()->json($html);

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

        $warehouse = Warehouse::find($id);

        // dd($warehouse);

        return view('warehouse.edit-warehouse',compact('warehouse'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Warehouse::find($id)->update([
            'name_warehouse' => $request->name_warehouse,
            'address' => $request->address,
            'pic' => $request->pic,
            'contact' => $request->contact,
        ]);

        return redirect()->route('warehouse.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Warehouse::find($id)->delete();

        return redirect()->route('warehouse.index');
    }
}
