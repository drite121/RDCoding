<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BarcodeGeneratorController extends Controller
{
    public function Generate(Request $request)
    {
        $generator = new \Picqer\Barcode\BarcodeGeneratorSVG();
        $image = $generator->getBarcode($request->text, $generator::TYPE_CODE_128, 3, 50);

        return response($image)->header('Content-type','image/png');
    }
    public function Download(Request $request)
    {
        $generator = new \Picqer\Barcode\BarcodeGeneratorJPG();
        $image = $generator->getBarcode($request->text, $generator::TYPE_CODE_128, 3, 50);
        echo $image;
        return response()->streamDownload(
            function () {
                echo $image;
            },
            'Barcode.jpg',
            [
                'Content-Type' => 'image/jpg',
            ]
        );
    }
}
