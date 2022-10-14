<?php

namespace App\Http\Controllers;

use App\Models\componentes as ModelsComponentes;
use Exception;
use Illuminate\Http\Request;

class componentes extends Controller
{
    protected $componentes;
    public function __construct()
    {
        $this->componentes = new ModelsComponentes();
    }

    public function show() {
        $componentes = $this->componentes::select(['idcomponente', 'componente', 'precio_u'])->get();

        return json_encode($componentes);
    }

    public function create(Request $request) {
        try {
            $this->componentes::create($request->all());

            return json_encode(["success" => 'Componente guardado exitosamente']);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function update(Request $request) {
        try {
            $componente = $this->componentes::Find($request->input('idcomponente'));

            $componente->componente = $request->input('componente');
            $componente->precio_u = $request->input('precio_u');

            $componente->save();
            return json_encode(["success" => 'Componente modificado exitosamente']);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
