<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dswisata extends Model
{
    //
       use HasFactory;
    protected $table = 'dswisatas';
    protected $primarykey = 'id';
    protected $fillable = ['foto', 'nama', 'deskripsi'];
}
