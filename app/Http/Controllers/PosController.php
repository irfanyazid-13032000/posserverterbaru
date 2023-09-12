<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::with('products')->get();
        $warehouses = Warehouse::all();
        $carts = Cart::join('products','products.id','=','carts.product_id')
                            ->select('carts.*','products.name_product','products.image')
                            ->get();

        $total_price_cart = $carts->sum('total_price');

        // return $carts;

        return view('pos.index',compact('products','categories','warehouses','carts','total_price_cart'));
    }

    public function cart()
    {
        $carts = Cart::join('products','products.id','=','carts.product_id')
                            ->select('carts.*','products.name_product','products.image')
                            ->get();

        $html = view('pos.cart',compact('carts'))->render();

        return response()->json($html);
    }


    public function totalAmount()
    {
        $carts = Cart::all();
        $total_price_cart = $carts->sum('total_price');
        
        $html = view('pos.total-amount',compact('total_price_cart'))->render();

        return response()->json($html);
    }

    public function itemsCount()
    {
        $carts = Cart::join('products','products.id','=','carts.product_id')
                            ->select('carts.*','products.name_product','products.image')
                            ->get();
        
        $html = "<span class='items__count'>".count($carts)."</span>";

        return response()->json($html);
    }


    public function products()
    {
        $products = Product::all();

        $html = view('pos.products',compact('products'))->render();

        return response()->json($html);
    }

    public function productsByCategory($category_id)
    {
        // 0 adalah ketika kategori nya all
        if ($category_id == 0) {
            $products = Product::all();
        }else{
            $products = Product::where('category_id',$category_id)->get();
        }
        // return $products;

        $html = view('pos.products',compact('products'))->render();

        return response()->json($html);
    }

    public function category()
    {
        $categories = Category::all();

        $html =  view('pos.categories',compact('categories'))->render();

        return response()->json($html);
    }

    public function struk(Request $request)
    {
        $carts = Cart::join('products','carts.product_id','=','products.id')
                        ->select('carts.*','products.name_product','products.image')
                        ->get();
        $total_cart_price = Cart::all()->sum('total_price');

        $uang_customer = $request->uang_customer;

        $html =  view('pos.struk',compact('carts','total_cart_price','uang_customer'))->render();

        return response()->json($html);
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
