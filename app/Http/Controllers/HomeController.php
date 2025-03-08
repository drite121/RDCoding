<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pages;

class HomeController extends Controller
{
    public function index()
    {
        $listData = Pages::select()->orderBy('id', 'DESC')->get();
        return view('home',compact('listData'));
    }
    public function prototypes()
    {
        $listData = Pages::select()->where('project','1')->orderBy('id', 'DESC')->get();
        return view('home',compact('listData'));
    }
    public function testzone()
    {
        $listData = Pages::select()->where('project','0')->orderBy('id', 'DESC')->get();
        return view('home',compact('listData'));
    }
    public function print($text)
    {
        return view('TestPrint',compact('text'));
    }
}
