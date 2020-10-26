<?php

namespace App\Http\Controllers;

use App\Http\Requests\SoftwareRequest;
use App\Software;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoftwareController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');

    }
    public function index()
    {
        $software = Software::where('id_user', Auth::user()->id)->first();
        return view('modulos.software', array('software' => $software));
    }
    public function store(SoftwareRequest $request)
    {
        $software = new Software;
        $software->softwares = json_encode(explode(',', $request->input('softwares')));
        $software->id_user = Auth::user()->id;

        if ($software->save() > 0) {
            return redirect('software')->with('save-success-software', '!Software agregado con exito!');
        } else {
            return redirect('software')->with('save-error-software', 'Error al agregar software, intente de nuevo');
        }

    }
    public function update(SoftwareRequest $request, $id)
    {
        $software = array('softwares' => json_encode(explode(',', $request->input('softwares'))));
        if (Software::where('id_software', $id)->where('id_user', Auth::user()->id)->update($software) > 0) {
            return redirect('software')->with('update-success-software', '¡Software actualizado con exito!');
        } else {
            return redirect('software')->with('update-error-software', 'Error al actualizar software, intente de nuevo');
        }
    }
}
