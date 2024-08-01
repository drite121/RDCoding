<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    // use HasFactory;
    protected $table = 'nota';
    protected $fillable = ['tanggal','total','pembayaran'];
    public $timestamps = false;
}
