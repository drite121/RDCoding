<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\QRGeneratorController;
use App\Http\Controllers\BarcodeGeneratorController;
use App\Http\Controllers\CurrencyController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/About', function () {
    return view('About');
});

Route::get('/Random', function () {
    return view('Random');
});

Route::get('/GameHitung', function () {
    return view('GameHitung');
});

Route::get('/PasswordGenerator', function () {
    return view('PasswordGenerator');
});

Route::get('/BMICalculator', function () {
    return view('BMICalculator');
});

Route::get('/QRGenerator', function () {
    return view('QRGenerator');
}); 
Route::get('/GenerateQR', [QRGeneratorController::class, 'Generate'])->name("QR.Generate");
Route::get('/DownloadQR', [QRGeneratorController::class, 'Download'])->name("QR.Download");

Route::get('/SortDataJS', function () {
    return view('SortDataJS');
});

Route::get('/QRScanner', function () {
    return view('QRScanner');
});

Route::get('/BarcodeGenerator', function () {
    return view('BarcodeGenerator');
}); 
Route::get('/GenerateBarcode', [BarcodeGeneratorController::class, 'Generate']);
Route::get('/DownloadBarcode', [BarcodeGeneratorController::class, 'Download']);

Route::get('/Chart', function () {
    return view('Chart');
});

Route::get('/Currency', function () {
    return view('Currency');
});

Route::get('/Notification', function () {
    return view('Notification');
});

Route::get('/GuessNumber', function () {
    return view('GuessNumber');
});

Route::get('/DadJokes', function () {
    return view('DadJokes');
});

Route::get('/ColorPalette', function () {
    return view('ColorPalette');
});

Route::get('/YoutubePlayer', function () {
    return view('YoutubePlayer');
});

Route::get('/EyeDroper', function () {
    return view('EyeDroper');
});

Route::get('/DataTabel', function () {
    return view('DataTabel');
});

Route::get('/ToDoList', function () {
    return view('ToDoList');
});

Route::get('/Suggestion', function () {
    return view('Suggestion');
});

Route::get('/SignaturePad', function () {
    return view('SignaturePad');
});

Route::get('/SignaturePad', function () {
    return view('SignaturePad');
});