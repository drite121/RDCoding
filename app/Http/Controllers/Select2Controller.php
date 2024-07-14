<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Barangs;

class Select2Controller extends Controller
{
    public function index()
    {
        $listData = Barangs::select()->get();
        return view('SearchableSelectbox',compact('listData'));
    }
}
