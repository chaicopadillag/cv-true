<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudio;
use App\Http\Requests\EstudioRequest;
use Illuminate\Support\Facades\Auth;

class EstudioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user  = Auth::user()->id;
        $estudios = Estudio::where('id_user', $id_user)->orderBy('updated_at', 'DESC')->get();

        return \view('modulos.estudios', array('estudios' => $estudios));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstudioRequest $request)
    {
        $estudio               = new Estudio();
        $estudio->especialidad = $request['especialidad'];
        $estudio->universidad  = $request['universidad'];
        $estudio->fecha_inicio = date('Y-m-d', strtotime($request['fecha_inicio']));
        $estudio->fecha_fin    = date('Y-m-d', strtotime($request['fecha_fin']));
        $estudio->descripcion  = $request['descripcion'];
        $estudio->id_user      = Auth::user()->id;
        if ($estudio->save() > 0) {
            return redirect('estudios')->with('succes-save-estudio', '¡Estudio agregado con exito!');
        } else {
            return redirect('estudios')->with('error-save-estudio', 'Error al agregar estudio, intente de nuevo');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id_user  = Auth::user()->id;
        $estudio  = Estudio::where('id_estudio', $id)->where('id_user', $id_user)->first();
        $estudios = Estudio::where('id_user', $id_user)->orderBy('updated_at', 'DESC')->get();

        if ($estudio != null) {
            return \view('modulos.estudios', array(
                'status'   => 200,
                'estudio'  => $estudio,
                'estudios' => $estudios,
            ));
        } else {
            return \view('modulos.estudios', array(
                'status'   => 404,
                'estudios' => $estudios,
            ));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstudioRequest $request, $id)
    {
        $estudio = array(
            'especialidad' => $request['especialidad'],
            'universidad'  => $request['universidad'],
            'fecha_inicio' => date('Y-m-d', strtotime($request['fecha_inicio'])),
            'fecha_fin'    => date('Y-m-d', strtotime($request['fecha_fin'])),
            'descripcion'  => $request['descripcion'],
            'id_user'      => Auth::user()->id,
        );

        if (Estudio::where('id_estudio', $id)->where('id_user', Auth::user()->id)->update($estudio) > 0) {
            return redirect('estudios')->with('succes-update-estudio', '¡Estudio actualizado con exito!');
        } else {
            return redirect('estudios')->with('error-update-estudio', 'Error al actualizar estudio, intente de nuevo');
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
        $studio = Estudio::where('id_estudio', $id)->first();
        if ($studio != null) {
            if (Estudio::where('id_estudio', $studio['id_estudio'])->where('id_user', Auth::user()->id)->delete() > 0) {
                return redirect('estudios')->with('success-delete-estudio', 'Estudio eliminado correctamente');
            } else {
                return redirect('estudios')->with('error-delete-estudio', 'Error al eliminar Estudio, intenta de nuevo');
            }
        } else {
            return redirect('estudios')->with('null-delete-estudio', 'El registro que intenta eliminar no existe en la base de datos');
        }
    }
}
