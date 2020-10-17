<?php

namespace App\Http\Controllers;

use App\Contacto;
use App\Http\Requests\ContactoEditRequest;
use App\Http\Requests\ContactoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $id_user = Auth::user()->id;
        $redes   = Contacto::where('id_user', $id_user)->first();
        return \view('modulos.redes_sociales', array('redes' => $redes));
    }
    public function store(ContactoRequest $request)
    {
        $red_social             = new Contacto;
        $red_social->pagina_web = $request->input('pagina_web');
        $red_social->linkedin   = $request->input('linkedin');
        $red_social->facebook   = $request->input('facebook');
        $red_social->instagram  = $request->input('instagram');
        $red_social->twitter    = $request->input('twitter');
        $red_social->tumblr     = $request->input('tumblr');
        $red_social->pinterest  = $request->input('pinterest');
        $red_social->spotify    = $request->input('spotify');
        $red_social->tiktok     = $request->input('tiktok');
        $red_social->id_user    = Auth::user()->id;
        if ($red_social->save() > 0) {
            return redirect('contactos')->with('success-save-contactos', '¡Red social agregado con exito!');
        } else {
            return redirect('contactos')->with('error-save-contactos', 'Error al agregar red social, intente de nuevo');
        }
    }
    public function update(ContactoEditRequest $request, $id)
    {
        $redes = array(
            'pagina_web' => $request->input('pagina_web'),
            'linkedin'   => $request->input('linkedin'),
            'facebook'   => $request->input('facebook'),
            'instagram'  => $request->input('instagram'),
            'twitter'    => $request->input('twitter'),
            'tumblr'     => $request->input('tumblr'),
            'pinterest'  => $request->input('pinterest'),
            'spotify'    => $request->input('spotify'),
            'tiktok'     => $request->input('tiktok'),
        );
        if (Contacto::where('id_red_social', $id)->where('id_user', Auth::user()->id)->update($redes) > 0) {
            return redirect('contactos')->with('success-update-contactos', '¡Red social actualizado con exito!');
        } else {
            return redirect('contactos')->with('error-update-contactos', 'Error al actualizar red social, intente de nuevo');
        }
    }
}
