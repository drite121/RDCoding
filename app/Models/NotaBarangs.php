<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaBarangs extends Model
{
    // use HasFactory;
    protected $table = 'notabarang';
    protected $fillable = ['nonota','codebarang','qty'];
    public $timestamps = false;
}
