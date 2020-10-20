<?php

namespace App\Http\Controllers;

use App\Cv;
use App\Http\Requests\UsuarioConfigRequest;
use App\Http\Requests\UsuarioRequest;
use App\Usuario;
use Ayudas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use phpDocumentor\Reflection\Types\Null_;

class UsuarioController extends Controller
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
        // if (Gate::allows('ver-usuarios')) {
        //     abort(403, 'No tiene permiso para ver este contenido');
        // }
        if (Auth::user()->rol != 1) {
            abort(403, 'No tiene permiso para ver este contenido');
        }
        $usuarios = Usuario::paginate(50);
        return \view("modulos.usuarios", array("usuarios" => $usuarios));
    }

    public function edit()
    {
        $id_user = Auth::user()->id;
        $user    = Usuario::where('id', $id_user)->first();
        return \view('modulos.perfil', array('user' => $user));
    }

    public function EditConfig()
    {
        $id_user = Auth::user()->id;
        $user    = Usuario::where('id', $id_user)->first();
        $cvs     = Cv::all();
        return \view('modulos.config', array('user' => $user, 'cvs' => $cvs));
    }

    public function update(UsuarioRequest $request, $id)
    {
        $img['foto'] = $request->file('foto');

        if (!empty($img['foto'])) {
            if (Auth::user()->foto != 'img/usuarios/default.png') {
                // unlink(Auth::user()->foto);
            }
            $foto = Ayudas::SubirImagenServidor($img['foto'], 'img/usuarios/user', 512, 512);
        } else {
            $foto = Auth::user()->foto ?? 'img/usuarios/default.png';
        }
        $perfil = array(
            'name'         => $request->input('name'),
            'apellidos'    => $request->input('apellidos'),
            'especialidad' => $request->input('especialidad'),
            'direccion'    => $request->input('direccion'),
            'telefono'     => $request->input('telefono'),
            'ciudad'       => $request->input('ciudad'),
            'pais'         => $request->input('pais'),
            'genero'       => (int) $request->input('genero'),
            'edad'         => (int) $request->input('edad'),
            'estado_civil' => $request->input('estado_civil'),
            'foto'         => $foto,
            'frase'        => $request->input('frase'),
            'resumen'      => $request->input('resumen'),
        );
        if (Usuario::where('id', $id)->update($perfil) > 0) {
            return redirect('perfil')->with('perfil-save-success', 'Tus datos de perfil se actualizarón correctamente');
        } else {
            return redirect('perfil')->with('perfil-save-error', 'Se ha producido un error al actualizar tu perfil');
        }
    }
    public function updateconfig(UsuarioConfigRequest $request, $id)
    {

        $perfil = array(
            'url_usuario' => strtolower($request->input('url_usuario')),
            'id_cv'       => $request->input('cv'),
            'public'      => (boolean) $request->input('perfil_public'),
        );
        if (Usuario::where('id', $id)->update($perfil) > 0) {
            return redirect('configuracion')->with('configuracion-save-success', '!Configuracion actualizada correctamente');
        } else {
            return redirect('configuracion')->with('configuracion-save-error', 'Se ha producido un error al actualizar tu Configuración');
        }
    }
}

