@extends('auth.plantilla-auth')

@section('titulo','Registro')

@section('pagina-active')
<a class="navbar-brand" href="{{route('register')}}">Página de Registro</a>
@endsection

@section('img-fondo'){{"'".asset('img/app/registro.jpg')."'"}}
@endsection

@section('formulario')
    <div class="col-lg-5 col-md-6 col-sm-8 ml-auto mr-auto">
        <form class="form" method="POST" action="{{ route('register') }}" id="form_registro">
            @csrf
            <div class="card card-login card-hidden">
                <div class="card-header card-header-rose text-center">
                    <h4 class="card-title">Registrarse</h4>
                    {{-- <div class="social-line">
                                    <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                    <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </div> --}}
                </div>
                <div class="card-body">
                    {{-- <p class="card-description text-center">Or Be Classical</p> --}}
                    {{-- <span class="bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">face</i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="First Name...">
                                    </div>
                                </span> --}}
                    <div class="form-group has-default">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">face</i>
                                </span>
                            </div>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="{{ __('Name') }}" id="name" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback ml-5" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group has-default">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">mail</i>
                                </span>
                            </div>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email"
                                placeholder="{{ __('E-Mail Address') }}">
                            @error('email')
                            <span class="invalid-feedback ml-5" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group has-default">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                            </div>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password"
                                placeholder="{{ __('Password') }}">
                            @error('password')
                            <span class="invalid-feedback ml-5" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group has-default">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                            </div>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="{{ __('Confirm Password') }}" equalTo="#password">
                            @error('password')
                            <span class="invalid-feedback ml-5" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group has-default">
                        <div class="input-group form-check">
                            <label class="form-check-label ml-4 mt-3">
                                <input class="form-check-input" type="checkbox" value="ok"
                                    name="terminos_condiciones" required>
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                                He leído y acepto
                                <a href="{{route('aviso-legal')}}" target="_blank">los términos de
                                    uso</a>.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-footer justify-content-center">
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Registrarse') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('auth-js')
<script src="{{asset('js/registro.js')}}"></script>
<script>
    $(document).ready(function() {
        md.checkFullPageBackgroundImage();
        setTimeout(function() {
            $('.card').removeClass('card-hidden');
        }, 700);
});
</script>
@endsection