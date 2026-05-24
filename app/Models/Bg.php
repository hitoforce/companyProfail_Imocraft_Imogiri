<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bg extends Model
{
    //
     use HasFactory;
    protected $table = 'bgs';
    protected $primarykey = 'id';
    protected $fillable = ['foto', 'nama', 'deskripsi'];
}
