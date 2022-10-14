<?php

namespace App\Http\Controllers;

use App\Models\equipos as ModelsEquipos;
use Exception;
use Illuminate\Http\Request;

class equipos extends Controller
{
    protected $equipos;
    public function __construct()
    {
        $this->equipos = new ModelsEquipos();
    }

    public function show() {
        $equipos = $this->equipos::join('personas', 'personas.idpersona', '=', 'equipos.idpersona')
                         ->select(['equipos.serie', 'equipos.model', 'equipos.marca', 'personas.nombres', 'personas.apellidos'])->get();

        return json_encode($equipos);
    }

    public function create(Request $request) {
        try {
            $id = $this->equipos::create($request->all());

            return json_encode(["success" => "Equipo guardado exitosamente", "id" => $id->idequipo]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function update(Request $request) {
        try {
            $equipo = $this->equipos::Find($request);

            $equipo->serie = $request->input('serie');
            $equipo->model = $request->input('model');
            $equipo->marca = $request->input('marca');

            $equipo->save();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


}
