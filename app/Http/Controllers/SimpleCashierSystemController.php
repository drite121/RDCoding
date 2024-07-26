<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Barangs;
use App\Models\Notas;

class SimpleCashierSystemController extends Controller
{
    public function index()
    {
        $listData = Barangs::select()->get();
        $getDate = Notas::max("tanggal");
        if($getDate<date("Y-m-d"))
        {
            Notas::truncate();
        }
        return view('SimpleCashierSystem',compact('listData'));
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
        // $getNo = Notas::max("nonota");
        $listData = Barangs::select()->join("notabarang","codebarang","=","code")->where("nonota","=",$id)->get();
        return view('PrintNota',compact('listData'));

        // $listData = Barangs::select()->join("notabarang","codebarang","=","code")->get();
        // return view('PrintNota',compact('listData'));
    }

    public function list()
    {
        $listNota = Notas::select('nonota','tanggal')->groupBy('nonota')->groupBy('tanggal')->get()->toArray();
        // $listNotaBarang = Notas::select()->get()->toArray();
        return $listNota;

        // $listData = Barangs::select()->join("notabarang","codebarang","=","code")->get();
        // return view('PrintNota',compact('listData'));
    }

    public function detail()
    {
        $listBarang = Notas::select()->join("barang","codebarang","=","code")->get()->toArray();
        return $listBarang;
    }
}
