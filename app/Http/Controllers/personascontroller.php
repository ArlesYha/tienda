<?php

namespace App\Http\Controllers;

use App\Models\personas;
use Exception;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class personascontroller extends Controller
{
    protected $personas;

    public function __construct()
    {
        $this->personas = new personas();
    }

    public function show() {
        return json_encode($this->personas::select(['idpersona', 'nombres', 'apellidos', 'n_contacto', 'correo'])->get());
    }

    public function create(Request $request) {
        try {
            $this->personas::create($request->all());

             return json_encode(["success" => "Persona registrada exitosamente"]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function update(Request $request) {
        try {
            $personas = $this->personas::Find($request->input('idpersona'));

            $personas->nombres = $request->input('nombres');
            $personas->apellidos = $request->input('apellidos');
            $personas->n_contacto = $request->input('n_contacto');
            $personas->correo = $request->input('correo');

            $personas->save();

            return json_encode(["success" => "Persona modificada exitosamente"]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
