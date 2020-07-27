<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\UsuarioModel;
use Ayudas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = UsuarioModel::all();
        return \view("modulos.usuarios", array("usuarios" => $usuarios));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id_user = Auth::user()->id;
        $user    = UsuarioModel::where('id', $id_user)->first();
        return \view('modulos.perfil', array('user' => $user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioRequest $request, $id)
    {
        $img['foto'] = $request->file('foto');

        if (!empty($img['foto'])) {
            $foto = Ayudas::SubirImagenServidor($img['foto'], 'img/usuarios/user', 512, 512);
        } else {
            $foto = 'img/usuarios/default.png';
        }
        $perfil = array(
            'name'         => $request->input('name'),
            'apellidos'    => $request->input('apellidos'),
            'especialidad' => $request->input('especialidad'),
            'direccion'    => $request->input('direccion'),
            'telefono'     => $request->input('telefono'),
            'ciudad'       => $request->input('ciudad'),
            'pais'         => $request->input('pais'),
            'genero'       => (int)$request->input('genero'),
            'edad'         => (int)$request->input('edad'),
            'estado_civil' => $request->input('estado_civil'),
            'foto'         => $foto,
            'frase'        => $request->input('frase'),
            'resumen'      => $request->input('resumen'),
        );
        if (UsuarioModel::where('id', $id)->update($perfil) > 0) {
            return redirect('/perfil')->with('perfil-save-success', 'Tus datos de perfil se actualizarón correctamente');
        } else {
            return redirect('/perfil')->with('perfil-save-error', 'Se ha producido un error al actualizar tu perfil');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
