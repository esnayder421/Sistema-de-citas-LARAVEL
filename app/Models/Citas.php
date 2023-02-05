<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;

    public $table = "citas";

    public $timestamps = false;
    
    public $primarykey = "id";

    public $foreignkey = "medico";

    public $foreignkey2 = "paciente";
}
