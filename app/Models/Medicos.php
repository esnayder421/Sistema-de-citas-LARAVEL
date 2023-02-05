<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
    public $table = "medicos";

    public $timestamps = false;
    
    public $primarykey = "id";
    
    use HasFactory;
}
