<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_mantenimiento extends Model
{
    use HasFactory;

    protected $table = 'detalle_mantenimiento';

    protected $primaryKey = 'iddetalle_mantenimiento';
    public $incrementing = true;

    protected $fillable = [
        'cantidad_componentes', 'idmantenimiento', 'idcomponente', 'idusuario'
    ];
}
