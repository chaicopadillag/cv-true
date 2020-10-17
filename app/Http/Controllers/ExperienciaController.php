<?php

namespace App\Http\Controllers;

use App\Experiencia;
use App\Http\Requests\ExperienciaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $id_user      = Auth::user()->id;
        $experiencias = Experiencia::where('id_user', $id_user)->orderBy('updated_at', 'DESC')->get();
        return view('modulos.experiencias', array('experiencias' => $experiencias));
    }
    public function store(ExperienciaRequest $request)
    {
        $experiencia               = new Experiencia();
        $experiencia->cargo        = $request['cargo'];
        $experiencia->empresa      = $request['empresa'];
        $experiencia->fecha_inicio = date('Y-m-d', strtotime($request['fecha_inicio']));
        $experiencia->fecha_fin    = date('Y-m-d', strtotime($request['fecha_fin']));
        $experiencia->descripcion  = $request['descripcion'];
        $experiencia->id_user      = Auth::user()->id;
        if ($experiencia->save() > 0) {
            return redirect('experiencias')->with('succes-save-experiencia', '!Experiencia agregado con exito!');
        } else {
            return redirect('experiencias')->with('error-save-experiencia', 'Error al agregar experiencia, intente de nuevo');
        }
    }
    public function show($id)
    {
        $id_user      = Auth::user()->id;
        $experiencia  = Experiencia::where('id_experiencia', $id)->where('id_user', $id_user)->first();
        $experiencias = Experiencia::where('id_user', $id_user)->orderBy('updated_at', 'DESC')->get();

        if ($experiencia != null) {
            return \view('modulos.experiencias', array(
                'status'       => 200,
                'experiencia'  => $experiencia,
                'experiencias' => $experiencias,
            ));
        } else {
            return \view('modulos.experiencias', array(
                'status'       => 404,
                'experiencias' => $experiencias,
            ));
        }
    }
    public function update(ExperienciaRequest $request, $id)
    {
        $estudio = array(
            'cargo'        => $request['cargo'],
            'empresa'      => $request['empresa'],
            'fecha_inicio' => date('Y-m-d', strtotime($request['fecha_inicio'])),
            'fecha_fin'    => date('Y-m-d', strtotime($request['fecha_fin'])),
            'descripcion'  => $request['descripcion'],
            'id_user'      => Auth::user()->id,
        );

        if (Experiencia::where('id_experiencia', $id)->where('id_user', Auth::user()->id)->update($estudio) > 0) {
            return redirect('experiencias')->with('succes-update-experiencia', '¡Experiencia actualizado con exito!');
        } else {
            return redirect('experiencias')->with('error-update-experiencia', 'Error al actualizar experiencia, intente de nuevo');
        }
    }
    public function destroy($id)
    {
        $experence = Experiencia::where('id_experiencia', $id)->first();
        if ($experence != null) {
            if (Experiencia::where('id_experiencia', $experence['id_experiencia'])->where('id_user', Auth::user()->id)->delete() > 0) {
                return redirect('experiencias')->with('success-delete-experiencia', 'Experiencia eliminado correctamente');
            } else {
                return redirect('experiencias')->with('error-delete-experiencia', 'Error al eliminar Experiencia, intenta de nuevo');
            }
        } else {
            return redirect('experiencias')->with('null-delete-experiencia', 'El registro que intenta eliminar no existe en la base de datos');
        }
    }
}
