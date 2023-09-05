<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($code)
    {
        $code_item = $code;
        $item = Item::where('code_item',$code)->first();
        $ingredients = Ingredient::where('code_item',$code)->get();
        return view('ingredient.index-ingredient',compact('ingredients','item','code_item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($code)
    {
        $ingredients = DB::table('warehouse_stock')->get();
        return view('ingredient.create-ingredient',compact('ingredients','code'));
    }

    public function ingredientsData($code)
    {
        // return $code;
        $data = [
            'item' => Item::where('code_item',$code)->first(),
            'ingredients' => Ingredient::where('code_item',$code)->get(),
            'total_price' => Ingredient::where('code_item',$code)->get()->sum('total_price')
        ];

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$code)
    {
        $updateQtyIngredient = Ingredient::where('code_ingredient',$request->code_ingredient)->get()->first();


        $stock_warehouse =  DB::table('warehouse_stock')->where('code_ingredient',$request->code_ingredient)->get()->first();
        DB::table('warehouse_stock')->where('code_ingredient',$request->code_ingredient)
            ->update([
            'stock' => $stock_warehouse->stock - $request->qty
        ]);

        if ($updateQtyIngredient) {
            Ingredient::where('code_ingredient',$request->code_ingredient)
                                ->get()
                                ->first()
                                ->update([
                                    'qty' => $request->qty + $updateQtyIngredient->qty
                                ]);
        }else{
            Ingredient::create([
                'code_item' => $code,
                'code_ingredient' => $request->code_ingredient,
                'name_ingredient' => $request->name_ingredient,
                'qty' => $request->qty,
                'unit' => $request->unit,
                'price_per_unit' => $request->price_per_unit,
                'total_price' => $request->price_per_unit * $request->qty,
            ]);
        }



        return redirect()->route('ingredient.index',['code'=> $code]);
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
    public function edit(string $code,$id)
    {


        $ingredient = Ingredient::where('ingredients.id',$id)
                            ->join('items','items.code_item','=','ingredients.code_item')
                            ->select('ingredients.*','items.code_item')
                            ->get()
                            ->first();



        return view('ingredient.edit-ingredient',compact('ingredient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Ingredient::find($id)->update([
            'name_ingredient' => $request->name_ingredient,
            'code_ingredient' => $request->code_ingredient,
            'qty' => $request->qty,
            'unit' => $request->unit,
            'price_per_unit' => $request->price_per_unit,
            'total_price' => $request->total_price,
        ]);

        return redirect()->route('ingredient.index',['code'=>$request->code_item]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $code, $id)
    {
        Ingredient::findOrFail($id)->delete();

        return redirect()->route('ingredient.index',['code'=> $code]);
    }
}
