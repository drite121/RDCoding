<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Barangs;

class Select2Controller extends Controller
{
    public function SearchableSelectbox()
    {
        $listData = Barangs::select()->get();
        return view('SearchableSelectbox',compact('listData'));
    }

    public function MultiSelectbox()
    {
        $listData = Barangs::select()->get();
        return view('MultiSelectbox',compact('listData'));
    }
}
