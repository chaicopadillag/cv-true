<footer class="footer">
    <div class="container-fluid">
        <nav class="float-left">
            <ul>
                <li>
                    <a class="nav-link" href="{{route('acerca-de')}}">
                        Acerca de CV True
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('ayuda')}}">
                        Ayuda
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('aviso-legal')}}">
                        Aviso legal
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('politicas-de-privacidad')}}">
                        Polítcias de privacidad
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('politicas-de-cookies')}}">
                        Polítcias de Cookies
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright float-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, hecho con <i class="material-icons">favorite</i> por
            <a href="{{env('URL_CREADOR')}}" target="_blank">{{env('APP_CREADOR')}}</a> para ayudarte.
        </div>
    </div>
</footer>