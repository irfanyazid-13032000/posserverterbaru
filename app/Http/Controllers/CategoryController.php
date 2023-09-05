<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::join('warehouses','categories.warehouse_id','=','warehouses.id')
                        ->select('categories.*','warehouses.name_warehouse')
                        ->get();

        return view('category.index-category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warehouses = Warehouse::all();
        return view('category.create-category',compact('warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_category' => 'required',
            'warehouse_id' => 'required',
        ]);

       Category::create([
        'name_category' => $request->name_category,
        'warehouse_id' => $request->warehouse_id,
       ]);

        return redirect()->route('category.index')->with('success', 'Kategori berhasil disimpan.');

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
        $category = Category::find($id);
        $warehouses = Warehouse::all();
        return view('category.edit-category',compact('category','warehouses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Category::find($id)->update([
            'name_category'=>$request->name_category,
            'warehouse_id'=>$request->warehouse_id,
        ]);

        return redirect()->route('category.index')->with('success', 'Kategori berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::find($id)->delete();

        return redirect()->route('category.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
