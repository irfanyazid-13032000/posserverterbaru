<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outlets = Outlet::join('warehouses','outlets.warehouse_id','=','warehouses.id')
                            ->select('outlets.*','warehouses.name_warehouse')
                            ->get();
        return view('outlet.index-outlet',compact('outlets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warehouses = Warehouse::all();
        return view('outlet.create-outlet',compact('warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Outlet::create([
            'name_outlet' => $request->name_outlet,
            'warehouse_id' => $request->warehouse_id,
            'address_outlet' => $request->address_outlet,
            'contact_outlet' => $request->contact_outlet,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->route('outlet.index');
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
        $outlet = Outlet::find($id);
        $warehouses = Warehouse::all();
        // return $outlet;
        return view('outlet.edit-outlet',compact('outlet','warehouses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $outlet = Outlet::find($id);

        $outlet->update([
            'name_outlet' => $request->name_outlet,
            'warehouse_id' => $request->warehouse_id,
            'contact_outlet' => $request->contact_outlet,
            'address_outlet' => $request->address_outlet,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->route('outlet.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Outlet::find($id)->delete();

        return redirect()->route('outlet.index');
    }
}
