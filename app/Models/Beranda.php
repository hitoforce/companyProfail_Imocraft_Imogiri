<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beranda extends Model
{
    //
        use HasFactory;
    protected $table='berandas';
    protected $primarykey='id';
    protected $fillable=['foto','nama','deskripsi','link','waktu','level'];
}
