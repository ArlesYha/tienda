<?php

namespace App\Http\Controllers;

use App\Models\detalle_mantenimiento;
use App\Models\mantenimientos as ModelsMantenimientos;
use Exception;
use Illuminate\Http\Request;

class mantenimientos extends Controller
{
    protected $mantenimiento;

    public function __construct()
    {
        $this->mantenimiento = new ModelsMantenimientos();
    }

    public function show() {
        $mantenimientos = $this->mantenimiento->select(['idmantenimiento', 'estado_mantenimiento', 'tipo_mantenimiento', 'fecha_mantenimiento', 'descripcion'])->get();

        return json_encode($mantenimientos);
    }

    public function create(Request $request) {
        try {
            $this->mantenimiento->estado_mantenimiento = $request->input('estado_mantenimiento');
            $this->mantenimiento->tipo_mantenimiento = $request->input('tipo_mantenimiento');
            $this->mantenimiento->fecha_mantenimiento = $request->input('fecha_mantenimiento');
            $this->mantenimiento->descripcion = $request->input('descripcion');
            $this->mantenimiento->idequipo = $request->input('idequipo');

            $this->mantenimiento->save();

            $detalle = $request->input('detalle');

            foreach ($detalle as $key => $objeto) {
                $detalle_matenimiento = new detalle_mantenimiento();
                $detalle_matenimiento->cantidad_componentes = $objeto["cantidad_componentes"];
                $detalle_matenimiento->idmantenimiento = $this->mantenimiento->idmantenimiento;
                $detalle_matenimiento->idcomponente = $objeto["idcomponente"];
                $detalle_matenimiento->idusuario = $objeto["idusuario"];

                $detalle_matenimiento->save();
            }

            return json_encode(["success" => 'Mantenimiento ingresado correctamente']);
        } catch (Exception $e) {
            die ($e->getMessage());
        }
    }

    public function update(Request $request) {
        try {
            $mantenimiento = $this->mantenimiento::Find($request->input("idmantenimiento"));

            $mantenimiento->estado_mantenimiento = $request->input('estado_mantenimiento');
            $mantenimiento->tipo_mantenimiento = $request->input('tipo_mantenimiento');
            $mantenimiento->fecha_mantenimiento = $request->input('fecha_mantenimiento');
            $mantenimiento->descripcion = $request->input('descripcion');
            $mantenimiento->idequipo = $request->input('idequipo');

            $mantenimiento->save();

            return json_encode(["success" => "Mantinimiento modificado correctamente"]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getTypeMantenimiento(Request $request) {
        try {
            $mantenimientos = $this->mantenimiento->select(['estado_mantenimiento', 'tipo_mantenimiento'])
                                                  ->where('tipo_mantenimiento', $request->input('tipo_mantenimiento'))
                                                  ->where('fecha_mantenimiento', $request->input('fecha_mantenimiento'))
                                                  ->get();

            return json_encode($mantenimientos);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getMantenimientoByDay(Request $request) {
        try {
            $mantenimientos = $this->mantenimiento->select(['estado_mantenimiento', 'tipo_mantenimiento'])
                                                  ->where('fecha_mantenimiento', $request->input('fecha_mantenimiento'))
                                                  ->where('estado_mantenimiento', 'F')
                                                  ->get();

            return json_encode($mantenimientos);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
