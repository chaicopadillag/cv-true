<?php

namespace App\Http\Controllers;

use App\UsuarioModel;
use Illuminate\Http\Request;
class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = UsuarioModel::all();
        return \view("modulos.usuarios", array("usuarios" => $usuarios));
    }
}
