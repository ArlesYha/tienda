<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mantenimientos extends Model
{
    use HasFactory;

    protected $table = 'mantenimientos';

    protected $primaryKey = 'idmantenimiento';
    public $incrementing = true;

    protected $fillable = [
        'estado_mantenimiento',
        'tipo_mantenimiento',
        'fecha_mantenimiento',
        'descripcion',
        'idequipo'
    ];
}
