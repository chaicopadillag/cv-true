<div class="sidebar" data-color="rose" data-background-color="black" data-image="{{asset('/img/app/sidebar2.jpg')}}">
    <div class="logo"><a href="{{route('inicio')}}" class="simple-text logo-mini">
            CV
        </a>
        <a href="{{url('/')}}" class="simple-text logo-normal">
            True
        </a></div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{asset(Auth::user()->foto??'img/usuarios/default.png')}}" />
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapsePerfil" class="username"
                    aria-expanded="{{request()->is('perfil','configuracion')  ? 'true' : 'false'}}">
                    <span>
                        @if(Auth::check())
                        {{Auth::user()->name}}
                        @else
                        {{'Invitado'}}
                        @endif
                        <b class="caret"></b>
                    </span>
                </a>
                @if(Auth::check())
                <div class="collapse {{request()->is('perfil','configuracion') ? 'show' : ''}}" id="collapsePerfil">
                    <ul class="nav">
                        <li class="nav-item {{request()->is('perfil') ? 'active' : ''}}">
                            <a class="nav-link" href="{{route('perfil')}}">
                                <span class="sidebar-mini">MP</span>
                                <span class="sidebar-normal">Mi Perfil</span>
                            </a>
                        </li>
                        <li class="nav-item {{request()->is('configuracion') ? 'active' : ''}}">
                            <a class="nav-link" href="{{route('config')}}">
                                <span class="sidebar-mini">C</span>
                                <span class="sidebar-normal">Configuraciones </span>
                            </a>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
        </div>
        <ul class="nav">
            {{-- FIXME: solo admin --}}
            @if (Auth::check())
                @if (Auth::user()->rol === 1)
                <li class="nav-item {{request()->is('usuarios') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('usuarios.index')}}/">
                        <i class="material-icons">people_alt</i>
                        <p>Usuarios</p>
                    </a>
                </li>
                @endif
            @endif
            {{-- TODO: usuarios --}}
            <li class="nav-item {{ request()->is('estudios') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('estudios.index')}}">
                    <i class="material-icons">school</i>
                    <p>Mis Estudios</p>
                </a>
            </li>
            <li class="nav-item {{request()->is('experiencias') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('experiencias.index')}}">
                    <i class="material-icons">business_center</i>
                    <p>Mis Experiencias</p>
                </a>
            </li>
            <li class="nav-item {{request()->is('habilidades') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('habilidades.index')}}">
                    <i class="material-icons">verified_user</i>
                    <p>Mis Habilidades</p>
                </a>
            </li>
            <li class="nav-item {{request()->is('proyectos') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('proyectos.index')}}">
                    <i class="material-icons">perm_media</i>
                    <p>Mis Proyectos</p>
                </a>
            </li>
            <li class="nav-item {{request()->is('contactos') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('contactos.index')}}">
                    <i class="material-icons">contacts</i>
                    <p>Contactos</p>
                </a>
            </li>
            <li class="nav-item {{request()->is('software') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('software.index')}}">
                    <i class="material-icons">desktop_mac</i>
                    <p>Mis Software's</p>
                </a>
            </li>
            {{-- FIXME: modelos de CVs --}}
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#cv_modelos">
                    <i class="material-icons">style</i>
                    <p> Ver Modelos
                        <b class="caret"></b>
                    </p>
                </a>
                @if (Auth::check())
                <div class="collapse" id="cv_modelos">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cv-card')}}" target="_blank">
                                <span class="sidebar-mini">CV</span>
                                <span class="sidebar-normal">Card</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cv-material')}}" target="_blank">
                                <span class="sidebar-mini">CV</span>
                                <span class="sidebar-normal">Material Desing</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cv-moderno')}}" target="_blank">
                                <span class="sidebar-mini">CV</span>
                                <span class="sidebar-normal">Moderno</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cv-dark')}}" target="_blank">
                                <span class="sidebar-mini">CV</span>
                                <span class="sidebar-normal">Dark</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cv-clasica')}}" target="_blank">
                                <span class="sidebar-mini">CV</span>
                                <span class="sidebar-normal">Clásica</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('cv-gray')}}" target="_blank">
                                <span class="sidebar-mini">CV</span>
                                <span class="sidebar-normal">Gray</span>
                            </a>
                        </li>
                    </ul>
                </div>
                @endif
            </li>
            {{-- FIXME: de CV TRUE --}}
            <li class="nav-item {{request()->is('acerca-de-cv-true') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('acerca-de')}}">
                    <i class="material-icons">info</i>
                    <p>Acerca de CV True</p>
                </a>
            </li>
            <li class="nav-item {{request()->is('ayuda') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('ayuda')}}">
                    <i class="material-icons">help</i>
                    <p>Ayuda</p>
                </a>
            </li>
            <li class="nav-item {{request()->is('aviso-legal') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('aviso-legal')}}">
                    <i class="material-icons">warning</i>
                    <p>Aviso legal</p>
                </a>
            </li>
            <li class="nav-item {{request()->is('politicas-de-privacidad') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('politicas-de-privacidad')}}">
                    <i class="material-icons">vpn_lock</i>
                    <p>Polítcias de privacidad</p>
                </a>
            </li>
            <li class="nav-item {{request()->is('politicas-de-cookies') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('politicas-de-cookies')}}">
                    <i class="material-icons">sd_storage</i>
                    <p>Polítcias de Cookies</p>
                </a>
            </li>
        </ul>
    </div>
</div>