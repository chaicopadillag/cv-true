<?php

namespace App\Http\Controllers;

use App\Habilidad;
use App\Http\Requests\HabilidadRequest;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HabilidadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $id_user     = Auth::user()->id;
        $habilidades = Habilidad::where('id_user', $id_user)->orderBy('updated_at', 'DESC')->get();
        return view('modulos.habilidades', array('habilidades' => $habilidades));
    }
    public function store(HabilidadRequest $request)
    {
        $skill              = new Habilidad();
        $skill->habilidad   = $request->input('habilidad');
        $skill->nivel       = $request->input('nivel');
        $skill->descripcion = $request->input('descripcion');
        $skill->id_user     = Auth::user()->id;
        if ($skill->save() > 0) {
            return redirect('habilidades')->with('save-success-habilidad', '¡Habilidad agregado con exito!');
        } else {
            return redirect('habilidades')->with('save-error-habilidad', 'Error al agregar habilidad, intente de nuevo');
        }
    }
    public function show($id)
    {
        $id_user     = Auth::user()->id;
        $habilidad   = Habilidad::where('id_habilidad', $id)->where('id_user', $id_user)->first();
        $habilidades = Habilidad::where('id_user', $id_user)->orderBy('updated_at', 'DESC')->get();
        if ($habilidad != null) {
            return view('modulos.habilidades', array('status' => 200, 'habilidad' => $habilidad, 'habilidades' => $habilidades));
        } else {
            return view('modulos.habilidades', array('status' => 404, 'habilidades' => $habilidades));
        }
    }
    public function update(HabilidadRequest $request, $id)
    {
        $skill = array(
            'habilidad'   => $request->input('habilidad'),
            'nivel'       => $request->input('nivel'),
            'descripcion' => $request->input('descripcion'),
        );
        if (Habilidad::where('id_habilidad', $id)->where('id_user', Auth::user()->id)->update($skill) > 0) {
            return redirect('habilidades')->with('succes-update-habilidad', '¡Habilidad actualizado con exito!');
        } else {
            return redirect('habilidades')->with('error-update-habilidad', 'Error al actualizar habilidad, intente de nuevo');
        }
    }
    public function destroy($id)
    {
        $skill = Habilidad::where('id_habilidad', $id)->first();
        if ($skill != null) {
            if (Habilidad::where('id_habilidad', $id)->where('id_user', Auth::user()->id)->delete() > 0) {
                return redirect('habilidades')->with('success-delete-habilidad', 'Habilidad eliminado correctamente');
            } else {
                return redirect('habilidades')->with('error-delete-habilidad', 'Error al eliminar Habilidad, intenta de nuevo');
            }
        } else {
            return redirect('habilidades')->with('null-delete-habilidad', 'El registro que intenta eliminar no existe en la base de datos');
        }
    }
}
