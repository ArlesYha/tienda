<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipos extends Model
{
    use HasFactory;

    protected $table = 'equipos';

    protected $primaryKey = 'idequipo';
    public $incrementing = true;

    protected $fillable = [
        'serie', 'model', 'marca', 'idpersona'
    ];
}
