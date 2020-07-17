<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstudiosModel;
use App\Http\Requests\EstudioRequest;
use Illuminate\Support\Facades\Auth;

class EstudiosController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::user()->id;
        $estudios = EstudiosModel::where('id_user', $id_user)->get();

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
        $estudio = new EstudiosModel();
        $estudio->especialidad = $request['especialidad'];
        $estudio->universidad = $request['universidad'];
        $estudio->fecha_inicio = date('Y-m-d', strtotime($request['fecha_inicio']));
        $estudio->fecha_fin = date('Y-m-d', strtotime($request['fecha_fin']));
        $estudio->descripcion = $request['descripcion'];
        $estudio->id_user = Auth::user()->id;
        if ($estudio->save() > 0) {
            return redirect('modulos.estudios')->with('succes-save-estudio', '¡Estudio agregado con exito!');
        } else {
            return redirect('modulos.estudios')->with('error-save-estudio', 'Error al agregar estudio, intente de nuevo');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
