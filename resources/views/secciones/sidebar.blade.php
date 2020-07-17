<div class="sidebar" data-color="rose" data-background-color="black" data-image="{{asset('/img/app/sidebar2.jpg')}}">
    <div class="logo"><a href="{{url('/')}}" class="simple-text logo-mini">
            CV
        </a>
        <a href="{{url('/')}}" class="simple-text logo-normal">
            True
        </a></div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{url('/')}}/img/usuarios/default.png" />
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
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
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> MP </span>
                                <span class="sidebar-normal"> Mi Perfil</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> S </span>
                                <span class="sidebar-normal"> Settings </span>
                            </a>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
        </div>
        <ul class="nav">
            {{-- FIXME: solo admin --}}
            <li class="nav-item {{request()->Is('usuarios') ? 'active' : ''}}">
                <a class="nav-link" href="{{url('/')}}/usuarios">
                    <i class="material-icons">people_alt</i>
                    <p>Usuarios</p>
                </a>
            </li>
            {{-- TODO: usuarios --}}
            <li class="nav-item {{request()->Is('estudios') ? 'active' : ''}}">
                <a class="nav-link" href="{{url('/')}}/estudios">
                    <i class="material-icons">school</i>
                    <p>Mis Estudios</p>
                </a>
            </li>
            <li class="nav-item {{request()->Is('experiencia') ? 'active' : ''}}">
                <a class="nav-link" href="{{url('/')}}/experiencia">
                    <i class="material-icons">business_center</i>
                    <p>Mis Experiencias</p>
                </a>
            </li>
            <li class="nav-item {{request()->Is('habilidades') ? 'active' : ''}}">
                <a class="nav-link" href="{{url('/')}}/habilidades">
                    <i class="material-icons">verified_user</i>
                    <p>Mis Habilidades</p>
                </a>
            </li>
            <li class="nav-item {{request()->Is('proyectos') ? 'active' : ''}}">
                <a class="nav-link" href="{{url('/')}}/proyectos">
                    <i class="material-icons">perm_media</i>
                    <p>Mis Proyectos</p>
                </a>
            </li>
            <li class="nav-item {{request()->Is('redsocial') ? 'active' : ''}}">
                <a class="nav-link" href="{{url('/')}}/redsocial">
                    <i class="material-icons">contacts</i>
                    <p>Mis Redes Sociales</p>
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
                <div class="collapse" id="cv_modelos">
                    <ul class="nav">
                        <li class="nav-item {{request()->Is('cvcard') ? 'active' : ''}}">
                            <a class="nav-link" data-toggle="collapse" href="{{url('/')}}/cvcard">
                                <span class="sidebar-mini"> CV </span>
                                <span class="sidebar-normal"> Card</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="components/buttons.html">
                                <span class="sidebar-mini"> CV </span>
                                <span class="sidebar-normal"> Material Desing </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="components/grid.html">
                                <span class="sidebar-mini"> GS </span>
                                <span class="sidebar-normal"> Grid System </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="components/panels.html">
                                <span class="sidebar-mini"> P </span>
                                <span class="sidebar-normal"> Panels </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="components/sweet-alert.html">
                                <span class="sidebar-mini"> SA </span>
                                <span class="sidebar-normal"> Sweet Alert </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="components/notifications.html">
                                <span class="sidebar-mini"> N </span>
                                <span class="sidebar-normal"> Notifications </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="components/icons.html">
                                <span class="sidebar-mini"> I </span>
                                <span class="sidebar-normal"> Icons </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="components/typography.html">
                                <span class="sidebar-mini"> T </span>
                                <span class="sidebar-normal"> Typography </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{request()->Is('acerca-de-cv-true') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('acerca-de')}}">
                    <i class="material-icons">info</i>
                    <p>Acerca de CV True</p>
                </a>
            </li>
            <li class="nav-item {{request()->Is('ayuda') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('ayuda')}}">
                    <i class="material-icons">help</i>
                    <p>Ayuda</p>
                </a>
            </li>
            <li class="nav-item {{request()->Is('aviso-legal') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('aviso-legal')}}">
                    <i class="material-icons">warning</i>
                    <p>Aviso legal</p>
                </a>
            </li>
            <li class="nav-item {{request()->Is('politicas-de-privacidad') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('politicas-de-privacidad')}}">
                    <i class="material-icons">vpn_lock</i>
                    <p>Polítcias de privacidad</p>
                </a>
            </li>
            <li class="nav-item {{request()->Is('politicas-de-cookies') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('politicas-de-cookies')}}">
                    <i class="material-icons">sd_storage</i>
                    <p>Polítcias de Cookies</p>
                </a>
            </li>
        </ul>
    </div>
</div>