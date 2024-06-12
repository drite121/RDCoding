<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Encryption\EncryptionServiceProvider;

class EncryptDecryptController extends Controller
{
    public function Task(Request $request)
    {
       if($request->task=="Encrypt")
       {   
        $cipher = "AES-256-CBC";
        return openssl_encrypt($request->text, $cipher, $request->key,0,$request->iv);
       }
       else if($request->task=="Decrypt")
       {
        $cipher = "AES-256-CBC";
        return openssl_decrypt($request->text, $cipher, $request->key,0,$request->iv);
       }
        
    }
}
