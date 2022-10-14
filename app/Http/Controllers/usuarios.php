<?php

namespace App\Http\Controllers;

use App\Models\usuarios as ModelsUsuarios;
use Exception;
use Illuminate\Http\Request;

class usuarios extends Controller
{
    protected $usuarios;

    public function __construct()
    {
        $this->usuarios = new ModelsUsuarios();
    }

    public function show() {
        $usuarios = $this->usuarios::join('personas', 'personas.idpersona', '=', 'usuarios.idpersona')
                         ->select(['usuarios.usuario', 'personas.nombres', 'personas.apellidos'])->get();

        return json_encode($usuarios);
    }

    public function create(Request $request) {
        try {
            $this->usuarios::create($request->all());

            return json_encode(["success" => "Usuario registrado exitosamente"]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function update(Request $request) {
        try {
            $usuario = $this->usuarios::Find($request->input('idusuario'));

            $usuario->usuario = $request->input('usuario');

            $usuario->save();

            return json_encode(["success" => "Usuario modificado exitosamente"]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
