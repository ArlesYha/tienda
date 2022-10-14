<?php

namespace App\Http\Controllers;

use App\Models\detalle_mantenimiento as ModelsDetalle_mantenimiento;
use Illuminate\Http\Request;

class detalle_mantenimiento extends Controller
{
    protected $detalle_mantenimiento;
    public function __construct()
    {
        $this->detalle_mantenimiento = new ModelsDetalle_mantenimiento();
    }

    public function show(Request $request) {
        $detalle = $this->detalle_mantenimiento->join('mantenimientos', 'mantenimientos.idmantenimiento', '=', 'detalle_mantenimiento.idmantenimiento')
                                               ->join('equipos', 'equipos.idequipo', '=', 'mantenimientos.idequipo')
                                               ->join('componentes', 'componentes.idcomponente', '=', 'detalle_mantenimiento.idcomponente')
                                               ->join('usuarios', 'usuarios.idusuario', '=', 'detalle_mantenimiento.idusuario')
                                               ->select(['mantenimientos.estado_mantenimiento',
                                                        'mantenimientos.tipo_mantenimiento',
                                                        'mantenimientos.fecha_mantenimiento',
                                                        'mantenimientos.descripcion',
                                                        'componentes.componente',
                                                        'componentes.precio_u',
                                                        'detalle_mantenimiento.cantidad_componentes',
                                                        'equipos.serie',
                                                        'equipos.model',
                                                        'equipos.marca',
                                                        'usuarios.usuario',
                                                        'detalle_mantenimiento.iddetalle_mantenimiento'
                                                ])
                                               ->where('detalle_mantenimiento.idmantenimiento', $request->input('idmantenimiento'))
                                               ->get();
        return json_encode($detalle);
    }
}
