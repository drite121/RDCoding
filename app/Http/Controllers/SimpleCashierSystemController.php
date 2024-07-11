<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Barangs;

class SimpleCashierSystemController extends Controller
{
    public function index()
    {
        $listData = Barangs::select()->get();
        return view('SimpleCashierSystem',compact('listData'));
    }
}
