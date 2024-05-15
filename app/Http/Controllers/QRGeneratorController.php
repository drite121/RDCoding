<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRController extends Controller
{
    public function Generate(Request $request)
    {
        // dd($request->SingleQRColor);
        return QrCode::size(200)
        ->margin(1)
        ->style('square')
        ->backgroundColor($request->BGCRed,$request->BGCGreen,$request->BGCBlue)
        ->color($request->QRCRed,$request->QRCGreen,$request->QRCBlue)
        ->errorCorrection('M')
        ->generate(
            $request->text,
        );
    }

    public function Download(Request $request)
    {
        $test = QrCode::size(200)
        ->format('png')
        ->margin(1)
        ->style('square')
        ->backgroundColor($request->BGCRed,$request->BGCGreen,$request->BGCBlue)
        ->color($request->QRCRed,$request->QRCGreen,$request->QRCBlue)
        ->errorCorrection('M')
        ->generate(
            $request->text,
        );
        echo $test;

        return response()->streamDownload(
            function () {
                echo QrCode::size(200)
                ->format('square')
                ->margin(1)
                ->style('dot')
                ->backgroundColor($request->BGCRed,$request->BGCGreen,$request->BGCBlue)
                ->color($request->QRCRed,$request->QRCGreen,$request->QRCBlue)
                ->generate(
                    $request->text,
                );
            },
            'qr-code.png',
            [
                'Content-Type' => 'image/png',
            ]
        );
    }
}
