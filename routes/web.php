<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\QRGeneratorController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
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