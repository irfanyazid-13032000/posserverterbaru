<?php

namespace App\Http\Controllers;

use DateTimeZone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $foods = DB::table('food_process')
        //                 ->join('bahan_dasars','food_process.bahan_dasar_id','=','bahan_dasars.id')
        //                 ->select('food_process.*','bahan_dasars.nama_bahan')
        //                 ->get();
        $menus = DB::table('menu_masakan')->get();
        return view('food.index-food',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bahan_dasars = DB::table('bahan_dasars')->get();
        $satuans = DB::table('satuan')->get();
        return view('food.create-food',compact('bahan_dasars','satuans'));
    }

    public function foodData($id)
    {
        return DB::table('bahan_dasars')->where('bahan_dasars.id',$id)
                                        ->join('satuan','bahan_dasars.satuan_id','=','satuan.id')
                                        ->join('kategori_bahan','bahan_dasars.kategori_bahan_id','=','kategori_bahan.id')
                                        ->select('bahan_dasars.*','satuan.nama_satuan','kategori_bahan.nama_kategori_bahan')
                                        ->get()->first();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        DB::table('menu_masakan')->insert([
            'nama_menu' => $request->nama_menu,
            'porsi' => $request->porsi,
        ]);

        return redirect()->route('food.index');
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
        $food = DB::table('menu_masakan')->where('id',$id)->get()->first();
        return view('food.edit-food',compact('food'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('menu_masakan')->where('id',$id)->update([
            'nama_menu' => $request->nama_menu,
            'porsi' => $request->porsi,
        ]);


        return redirect()->route('food.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('menu_masakan')->where('id',$id)->delete();

        return redirect()->route('food.index');
    }



    public function foodProcess($id)
    {
        $food = DB::table('menu_masakan')->where('id',$id)->get()->first();
        // $count_set_menu = DB::table('count_set_menu')->where('menu_masakan_id',$id)->get()->first();
        // return $food;
        // $foods_process = DB::table('food_process')->where('menu_masakan_id',$id)->get();
        $foods_process = DB::table('food_process')
                        ->join('bahan_dasars','food_process.bahan_dasar_id','=','bahan_dasars.id')
                        ->join('satuan','food_process.satuan_id','=','satuan.id')
                        ->where('food_process.menu_masakan_id',$id)
                        ->select('food_process.*','bahan_dasars.nama_bahan','bahan_dasars.harga_satuan as harga_satuan_bahan_dasar','satuan.nama_satuan')
                        ->get();

        $totalPrice = $foods_process->map(function ($item) {
            return $item->harga_satuan_bahan_dasar * $item->qty;
        })->sum();
        // return $foods_process;
        return view('food.food_process.index-food-process',compact('foods_process','food','id','totalPrice'));
    }

    public function foodProcessCreate($id)
    {
        $bahan_dasars = DB::table('bahan_dasars')->join('satuan','bahan_dasars.satuan_id','=','satuan.id')->select('bahan_dasars.*','satuan.nama_satuan','satuan.id AS satuan_id')->get();
        return view('food.food_process.create-food-process',compact('bahan_dasars','id'));
    }



    public function foodProcessStore(Request $request, $id)
    {
        DB::table('food_process')->insert([
            'menu_masakan_id' => $id,
            'bahan_dasar_id' => $request->bahan_dasar_id,
            'satuan_id' => $request->satuan_id,
            'qty' => $request->qty,
            'created_at' => Carbon::now(new DateTimeZone('Asia/Jakarta')),
        ]);

        return redirect()->route('food.process',['id'=>$id]);
    }

    public function foodProcessEdit($id_food_process)
    {
        $bahan_dasars = DB::table('bahan_dasars')->get();
        $satuans = DB::table('satuan')->get();
        $food_process = DB::table('food_process')->where('food_process.id',$id_food_process)
                                        ->join('bahan_dasars','food_process.bahan_dasar_id','=','bahan_dasars.id')
                                        ->select('food_process.*','bahan_dasars.harga_satuan')
                                        ->get()->first();
        return view('food.food_process.edit-food-process',compact('bahan_dasars','satuans','food_process','id_food_process'));
    }

    public function foodProcessUpdate(Request $request, $id_food_process)
    {
        // return $request;
        $food = DB::table('food_process')->where('id',$id_food_process)->get()->first();

        DB::table('food_process')->where('id',$id_food_process)->update([
            'bahan_dasar_id' => $request->bahan_dasar_id,
            'satuan_id' => $request->satuan_id,
            'qty' => $request->qty,
        ]);

        return redirect()->route('food.process',['id'=>$food->menu_masakan_id]);
    }

    public function foodProcessDelete($id_food_process)
    {
        $food = DB::table('food_process')->where('id',$id_food_process)->get()->first();

        DB::table('food_process')->where('id',$id_food_process)->delete();

        return redirect()->route('food.process',['id'=>$food->menu_masakan_id]);
    }
}
