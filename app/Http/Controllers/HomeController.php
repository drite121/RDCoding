<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pages;

class HomeController extends Controller
{
    public function index()
    {
        $listData = Pages::select()->orderBy('id', 'DESC')->get();
        return view('Home',compact('listData'));
    }
}
