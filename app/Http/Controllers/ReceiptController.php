<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Sales;
use App\Models\Receipt;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function print($receipt_no)
    {
        $receipts = Receipt::join('products','products.id','=','receipts.product_id')
                    ->where('receipts.receipt_no',$receipt_no)
                    ->select('receipts.*','products.name_product')
                    ->get();
        $receipt_first = $receipts->first();
        $total_price_receipt = $receipts->sum('total_price');

        $tanggal = Carbon::parse($receipt_first->created_at);
        $tanggalFormatted = $tanggal->isoFormat('D MMMM YYYY');

        return view('receipt.print-receipt',compact('receipts','receipt_first','total_price_receipt','tanggalFormatted'));
    }

   

    /**
     * Show the form for creating a new resource.
     */

    
    public function create(Request $request)
    {
        // return $request;
        $receipt_no = Str::random(10);

    
        foreach ($request->cart as $value) {
            Receipt::create([
                'customer_name' => $request->customer_name,
                'payment_method' => $request->payment_method,
                'total_price' => $value['total_price'], // Access array values using square brackets []
                'qty' => $value['qty'], // Access array values using square brackets []
                'price' => $value['price'], // Access array values using square brackets []
                'product_id' => $value['product_id'], // Access array values using square brackets []
                'receipt_no' => $receipt_no,
                'email_customer' => $request->email_customer,
                'no_wa' => $request->no_wa,
                'customer_money' => $request->customer_money,
                'change_cashier' => $request->change_cashier,
            ]);
        }

        Sales::create([
            'receipt_no' => $receipt_no,
            'customer_name' => $request->customer_name,
            'total_cart_price'=>$request->total_cart_price,
            'no_wa'=>$request->no_wa,
            'email_customer'=>$request->email_customer
        ]);

        Cart::truncate();

    
        return redirect()->route('receipt.print',['receipt_no'=>$receipt_no]);
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
