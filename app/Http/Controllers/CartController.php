<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Receipt;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function insert($id)
    {
        $product = Product::find($id);

        // jika product sudah ada di cart
        $checkDuplicationProduct = Cart::where('product_id',$product->id)->first();
        // $qtyProductInCart = $checkDuplicationProduct->qty;
        // dd($checkDuplicationProduct->qty);
        if($checkDuplicationProduct == null){
            Cart::create([
                'generated_card_number' => '34234wr32',
                'product_id' => $product->id,
                'price' => $product->price,
                'qty' => 1,
                'total_price' => $product->price,
            ]);

        }else{

            $checkDuplicationProduct->update([
                'generated_card_number' => '34234wr32',
                'product_id' => $product->id,
                'price' => $product->price,
                'qty' => $checkDuplicationProduct->qty + 1,
                'total_price' => $product->price * ($checkDuplicationProduct->qty + 1),
            ]);

        }


        return response()->json('berhasil');
    }


    public function remove($id)
    {
        Cart::find($id)->delete();


        return redirect()->route('pos.cart');
    }


    public function checkout(Request $request)
    {
        $carts = Cart::join('products','carts.product_id','=','products.id')
                        ->select('carts.*','products.name_product','products.image')
                        ->get();
        $total_cart_price = Cart::all()->sum('total_price');
        return view('pos.checkout',compact('carts','total_cart_price'));
    }

    public function increase($id)
    {
        $cart = Cart::find($id);

        $cart->update([
            'qty' => $cart->qty+1,
            'total_price' => ($cart->qty+1) * $cart->price
        ]);


        return response()->json('berhasil');
    }

    public function decrease($id)
    {
        $cart = Cart::find($id);

        $cart->update([
            'qty' => $cart->qty-1,
            'total_price' => ($cart->qty-1) * $cart->price
        ]);

        return response()->json('berhasil');
        
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
