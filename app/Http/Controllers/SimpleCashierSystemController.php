<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Barangs;
use App\Models\Notas;
use DB;

class SimpleCashierSystemController extends Controller
{
    public function index()
    {
        $getDate = Notas::max("tanggal");
        if($getDate<date("Y-m-d"))
        {
            $deleted = Barangs::select()->where('id', '>', 10)->delete();
            DB::statement('ALTER TABLE barang AUTO_INCREMENT = 10');
            Notas::truncate();
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
        // dd($request->Code[1]);
        $getNo = Notas::max("nonota")+1;

        for($x = 0; $x < count($request->Code); $x++)
        {
            $AddItems = new Notas([
                'nonota' => $getNo,
                'codebarang' => $request->Code[$x],
                'qty' => $request->Qty[$x],
                'tanggal' => date("Y-m-d"),
            ]);
            $AddItems->save();
        }
        

        return $getNo;
    }

    public function print($id)
    {
        $listData = Barangs::select()->join("notabarang","codebarang","=","code")->where("nonota","=",$id)->get();
        return view('PrintNota',compact('listData'));
    }

    public function list()
    {
        $listNota = Notas::select('nonota','tanggal')->groupBy('nonota')->groupBy('tanggal')->get()->toArray();
        return $listNota;
    }

    public function detail()
    {
        $listBarang = Notas::select()->join("barang","codebarang","=","code")->get()->toArray();
        return $listBarang;
    }


}
