<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\RecordBahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RecordBahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $proses_produksi_id = $request->query('proses_produksi_id');
        $cari = $request->query('cari');
        if (!empty($request->query('startDate')) && !empty($request->query('endDate'))) {
            $date_from = date("Y-m-d",strtotime($request->query('startDate')));
            $date_to = date("Y-m-d",strtotime($request->query('endDate')));
            $date_from_start = $date_from . ' 00:00:00';
            $date_to_end = $date_to . ' 23:59:59';
        }else{
            $date_from_start = '';
            $date_to_end = '';
            $date_from = '';
            $date_to = '';
        }

        $record_bahans = RecordBahan::join('kategori_proses_produksi', 'record_bahan.kategori_produksi_id', '=', 'kategori_proses_produksi.id')
        ->join('bahan_dasars', 'record_bahan.bahan_dasar_id', 'bahan_dasars.id')
        ->join('menu_masakan', 'record_bahan.menu_masakan_id', '=', 'menu_masakan.id');

        if(!empty($cari)){
            $record_bahans->where('bahan_dasars.nama_bahan','like','%'.$cari.'%')
                            ->orWhere('menu_masakan.nama_menu','like','%'.$cari.'%');
        }

        if (!empty($date_from) && !empty($date_to)) {
            $record_bahans->where('record_bahan.created_at', '>=', $date_from_start)
                          ->where('record_bahan.created_at', '<=', $date_to_end);
        }

        if (!empty($proses_produksi_id)) {
            $record_bahans->where('kategori_produksi_id',$proses_produksi_id);
        }

        $record_bahans = $record_bahans->select('record_bahan.*', 'kategori_proses_produksi.nama_kategori', 'bahan_dasars.nama_bahan', 'menu_masakan.nama_menu')
        ->paginate(5)->onEachSide(2);
   

        $kategori_proses_produksis = DB::table('kategori_proses_produksi')->get();
        return view('record_bahan.record-bahan-pagination-sendiri',compact('record_bahans','cari','date_to','date_from','kategori_proses_produksis'));
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
        DB::table('record_bahan')->where('id',$id)->delete();
        return redirect()->route('record.bahan.index');
    }

    

    public function data(Request $request)
    {
        $query = RecordBahan::join('kategori_proses_produksi', 'record_bahan.kategori_produksi_id', '=', 'kategori_proses_produksi.id')
            ->join('bahan_dasars', 'record_bahan.bahan_dasar_id', 'bahan_dasars.id')
            ->join('menu_masakan', 'record_bahan.menu_masakan_id', '=', 'menu_masakan.id')
            ->select('record_bahan.*', 'kategori_proses_produksi.nama_kategori', 'bahan_dasars.nama_bahan', 'menu_masakan.nama_menu');
    
            // if ($request->has('dateFrom') && $request->has('dateTo')) {
            //     $query->whereRaw("DATE(record_bahan.created_at) >= ? AND DATE(record_bahan.created_at) <= ?", [$request->input('dateFrom'), $request->input('dateTo')]);
            // }

            // if($request->('dateFrom')!=null && $request->has('dateTo')!=null){
            //     $query->whereRaw("DATE(record_bahan.created_at) >= ? AND DATE(record_bahan.created_at) <= ?", [$request->input('dateFrom'), $request->input('dateTo')]);
            // }

            $query->get();
    
        $index = 0; // Initialize index variable
    
        return Datatables::of($query)
            ->addColumn('DT_RowIndex', function ($item) use (&$index) {
                return ++$index;
            })
            ->addColumn('price_per_bahan', function ($item) {
                return 'Rp. ' . number_format($item->price_per_bahan);
            })
            ->addColumn('jumlah_cost_per_bahan', function ($item) {
                return 'Rp. ' . number_format($item->jumlah_cost_per_bahan);
            })
            ->addColumn('created_at', function ($item) {
                return  date("d-m-Y", strtotime($item->created_at));
            })
            ->addColumn('action', function ($item) {
                return '<a href="'.route('record.bahan.delete',['id'=>$item->id]).'" onclick="return confirm("apakah anda yakin menghapus data ini?")" class="btn btn-danger">delete</a>';
            })
            ->toJson();
    }


    public function table()
    {

        $record_bahans = RecordBahan::join('kategori_proses_produksi', 'record_bahan.kategori_produksi_id', '=', 'kategori_proses_produksi.id')
                        ->join('bahan_dasars', 'record_bahan.bahan_dasar_id', 'bahan_dasars.id')
                        ->join('menu_masakan', 'record_bahan.menu_masakan_id', '=', 'menu_masakan.id')
                        ->select('record_bahan.*', 'kategori_proses_produksi.nama_kategori', 'bahan_dasars.nama_bahan', 'menu_masakan.nama_menu')
                        ->paginate(10);
        
        $html = view('record_bahan.record-bahan-table',compact('record_bahans'))->render();

        return $html;
    }
    

    
    
    
}
