<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangs extends Model
{
    // use HasFactory;
    protected $table = 'barang';
    protected $fillable = ['id','code','nama','harga'];
    public $timestamps = false;
}
