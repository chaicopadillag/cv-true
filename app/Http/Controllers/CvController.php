<?php

namespace App\Http\Controllers;

use App\Contacto;
use App\Cv;
use App\Estudio;
use App\Experiencia;
use App\Habilidad;
use App\Proyecto;
use App\Software;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CvController extends Controller
{
    public $user;
    public $url;
    public $modelo;
    public function __construct()
    {
        $this->user   = null;
        $this->url    = null;
        $this->modelo = 2;
    }

    public function CV($id_user, $url = null)
    {

        if ($id_user != null and $url == null) {
            $user = User::where('id', $id_user)->first();
            if ($user == null) {
                abort(404);
            } else {

                $estudios     = Estudio::where('id_user', $id_user)->orderBy('updated_at', 'DESC')->get();
                $experiencias = Experiencia::where('id_user', $id_user)->orderBy('updated_at', 'DESC')->get();
                $habilidades  = Habilidad::where('id_user', $id_user)->orderBy('updated_at', 'DESC')->get();
                $proyectos    = Proyecto::where('id_user', $id_user)->orderBy('updated_at', 'DESC')->get();
                $contactos    = Contacto::where('id_user', $id_user)->orderBy('updated_at', 'DESC')->get();
                $softwares    = Software::where('id_user', $id_user)->orderBy('updated_at', 'DESC')->get();
            }
        } else {
            $user = User::where('url_usuario', $url)->first();
            if ($user == null) {
                abort(404);
            } else {
                $estudios     = Estudio::where('id_user', $user->id)->orderBy('updated_at', 'DESC')->get();
                $experiencias = Experiencia::where('id_user', $user->id)->orderBy('updated_at', 'DESC')->get();
                $habilidades  = Habilidad::where('id_user', $user->id)->orderBy('updated_at', 'DESC')->get();
                $proyectos    = Proyecto::where('id_user', $user->id)->orderBy('updated_at', 'DESC')->get();
                $contactos    = Contacto::where('id_user', $user->id)->orderBy('updated_at', 'DESC')->get();
                $softwares    = Software::where('id_user', $user->id)->orderBy('updated_at', 'DESC')->get();
            }
        }

        if (empty($estudios[0]) || empty($experiencias[0]) || empty($habilidades[0]) || empty($proyectos[0]) || empty($contactos[0]) || empty($softwares[0])) {
            abort(403, 'El que CV quiere ver aun no ha sido completado al 100%');
        }

        return array(
            'usuario'      => $user,
            'estudios'     => $estudios,
            'experiencias' => $experiencias,
            'habilidades'  => $habilidades,
            'proyectos'    => $proyectos,
            'contactos'    => $contactos[0],
            'softwares'    => $softwares[0],
        );
    }

    public function CvCard($url = null)
    {

        if (Auth::check()) {
            $this->user = Auth::user()->id;
        } else {
            $this->url = $url;
        }
        return view('cv.card', self::CV($this->user, $this->url));
    }

    public function Material($url = null)
    {
        if (Auth::check()) {
            $this->user = Auth::user()->id;
        } else {
            $this->url = $url;
        }
        return view('cv.material', self::CV($this->user, $this->url));
    }

    public function Moderno($url = null)
    {
        if (Auth::check()) {
            $this->user = Auth::user()->id;
        } else {
            $this->url = $url;
        }
        return view('cv.moderno', self::CV($this->user, $this->url));
    }

    public function Dark($url = null)
    {
        if (Auth::check()) {
            $this->user = Auth::user()->id;
        } else {
            $this->url = $url;
        }
        return view('cv.dark', self::CV($this->user, $this->url));
    }

    public function Clasica($url = null)
    {
        if (Auth::check()) {
            $this->user = Auth::user()->id;
        } else {
            $this->url = $url;
        }
        return view('cv.clasica', self::CV($this->user, $this->url));
    }

    public function Gray($url = null)
    {
        if (Auth::check()) {
            $this->user = Auth::user()->id;
        } else {
            $this->url = $url;
        }
        return view('cv.gray', self::CV($this->user, $this->url));
    }

    public function UrlDirecto($url = null)
    {
        // if (Auth::check()) {
        //     $this->user = Auth::user()->id;
        // } else {
        // $this->url = $url;
        // }
        $this->url = $url;
        return view('cv.' . substr(self::ElegirModelo($this->url), 3), self::CV($this->user, $this->url));
    }

    public function ElegirModelo($url)
    {
        $user = User::where('url_usuario', $url)->first();

        if ($user == null) {
            abort(404);
        } else {
            if ($user->url_usuario == null) {
                abort(404);
            }

            if ($user->public == false) {
                abort(404);
            }

            $cv     = Cv::where('id_cv', $user->id_cv)->first();
            $modelo = $cv->url;
        }
        return $modelo;
    }
}
