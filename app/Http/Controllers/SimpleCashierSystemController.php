<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Barangs;
use App\Models\Notas;
use App\Models\NotaBarangs;
use DB;

class SimpleCashierSystemController extends Controller
{
    public function index()
    {
        $getDate = Notas::max("tanggal");
        $getCountN = Notas::count();
        $getCountB = Barangs::count();
        if($getDate<date("Y-m-d")||$getCountN==0)
        {
            if($getCountB>10)
            {
                $deleted = Barangs::select()->where('id', '>', 10)->delete();
                DB::statement('ALTER TABLE barang AUTO_INCREMENT = 10');
            }
            Notas::truncate();
            NotaBarangs::truncate();
        }
        $listData = Barangs::select()->get();
        return view('SimpleCashierSystem',compact('listData'));
    }
    public function ListBarang()
    {
        $listBarang = Barangs::select()->get()->toArray();
        return $listBarang;
    }

    public function AddBarang(Request $request)
    {
        $count = Barangs::select()->where('code',$request->Code)->count();
        // dd($count);
        if($count==0)
        {
            $AddItems = new Barangs([
                'code' => $request->Code,
                'nama' => $request->Name,
                'harga' => $request->Price,
            ]);
            $AddItems->save();
            return "New item added successfully";
        }
        else
        {
            return "This code has been used";
        }
        
    }

    public function finish(Request $request)
    {
        // dd($request);
        $AddNota = new Notas([
            'total' => $request->Gtotal,
            'pembayaran' => $request->Pembayaran,
            'tanggal' => date("Y-m-d"),
        ]);
        $AddNota->save();
        $getNo = Notas::max("id");

        for($x = 0; $x < count($request->Code); $x++)
        {
            $AddItems = new NotaBarangs([
                'nonota' => $getNo,
                'codebarang' => $request->Code[$x],
                'qty' => $request->Qty[$x],
            ]);
            $AddItems->save();
        }

        return $getNo;
    }

    public function print($id, $Nama, $Address, $Phone)
    {

        $listData = Barangs::select()->join("notabarang","codebarang","=","code")->leftjoin("nota","nota.id","=","nonota")->where("nonota","=",$id)->get();
        return view('PrintNota',compact('listData', 'Nama', 'Address', 'Phone'));
    }

    public function list()
    {
        $listNota = Notas::select('id','tanggal')->groupBy('id')->groupBy('tanggal')->get()->toArray();
        return $listNota;
    }

    public function detail()
    {
        $listBarang = NotaBarangs::select()->leftjoin("nota","nota.id","=","nonota")->join("barang","codebarang","=","code")->get()->toArray();
        return $listBarang;
    }


}
