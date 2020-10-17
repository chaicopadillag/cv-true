<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProyectoEditRequest;
use App\Http\Requests\ProyectoRequest;
use App\Proyecto;
use Ayudas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProyectoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id_user  = Auth::user()->id;
        $projects = Proyecto::where('id_user', $id_user)->orderBy('updated_at', 'DESC')->get();
        return view('modulos.proyectos', array('proyectos' => $projects));
    }
    public function store(ProyectoRequest $request)
    {
        $img = $request->file('foto');
        if (!empty($img)) {
            $foto = Ayudas::SubirImagenServidor($img, 'img/proyectos/proyecto', 1200, 764);
        } else {
            $foto = 'img/proyectos/default.jpg';
        }

        $proyecto              = new Proyecto;
        $proyecto->titulo      = $request->input('titulo');
        $proyecto->foto        = $foto;
        $proyecto->url         = $request->input('pagina_web');
        $proyecto->lugar       = $request->input('lugar');
        $proyecto->fecha       = date('Y-m-d', strtotime($request->input('fecha')));
        $proyecto->descripcion = $request->input('descripcion');
        $proyecto->id_user     = Auth::user()->id;
        if ($proyecto->save() > 0) {
            return redirect('proyectos')->with('save-success-proyecto', '¡Proyecto agregado con exito!');
        } else {
            return redirect('proyectos')->with('save-error-proyecto', 'Error al agregar proyecto, intente de nuevo');
        }

    }
    public function show($id)
    {
        $id_user   = Auth::user()->id;
        $project   = Proyecto::where('id_proyecto', $id)->where('id_user', $id_user)->first();
        $proyectos = Proyecto::where('id_user', $id_user)->orderBy('updated_at', 'DESC')->get();

        if ($project != null) {
            return \view('modulos.proyectos', array(
                'status'    => 200,
                'project'   => $project,
                'proyectos' => $proyectos,
            ));
        } else {
            return \view('modulos.proyectos', array(
                'status'    => 404,
                'proyectos' => $proyectos,
            ));
        }
    }
    public function update(ProyectoEditRequest $request, $id)
    {
        $img        = $request->file('foto');
        $img_actual = $request->input('foto_actual');
        if (!empty($img)) {
            if ($img_actual != 'img/proyectos/default.jpg') {
                unlink($img_actual);
            }
            $foto = Ayudas::SubirImagenServidor($img, 'img/proyectos/proyecto', 1200, 764);
        } else {
            $foto = $img_actual;
        }

        $proyecto = array(
            'titulo'      => $request->input('titulo'),
            'url'         => $request->input('pagina_web'),
            'lugar'       => $request->input('lugar'),
            'fecha'       => date('Y-m-d', strtotime($request->input('fecha'))),
            'lugar'       => $request->input('lugar'),
            'descripcion' => $request->input('descripcion'),
            'foto'        => $foto,
        );
        if (Proyecto::where('id_proyecto', $id)->where('id_user', Auth::user()->id)->update($proyecto) > 0) {
            return redirect('proyectos')->with('succes-update-proyecto', '¡Proyecto actualizado con exito!');
        } else {
            return redirect('proyectos')->with('error-update-proyecto', 'Error al actualizar proyecto, intente de nuevo');
        }
    }
    public function destroy($id)
    {
        $proyecto = Proyecto::where('id_proyecto', $id)->first();
        if ($proyecto != null) {
            if (Proyecto::where('id_proyecto', $proyecto->id_proyecto)->where('id_user', Auth::user()->id)->delete() > 0) {
                unlink($proyecto->foto);
                return redirect('proyectos')->with('success-delete-proyecto', 'Proyecto eliminado correctamente');
            } else {
                return redirect('proyectos')->with('error-delete-proyecto', 'Error al eliminar Proyecto, intenta de nuevo');
            }
        } else {
            return redirect('proyectos')->with('null-delete-proyecto', 'El registro que intenta eliminar no existe en la base de datos');
        }
    }
}
