@extends('auth.plantilla-auth')

@section('titulo','Login')

@section('pagina-active')
<a class="navbar-brand" href="{{route('login')}}">Inicio de Sesión</a>
@endsection

@section('img-fondo'){{"'".asset('img/app/login.jpg')."'"}}
@endsection

@section('formulario')
<div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
    <form class="form" method="POST" action="{{ route('login') }}" id="form_login">
        @csrf
        <div class="card card-login card-hidden">
            <div class="card-header card-header-rose text-center">
                <h4 class="card-title">Inicio de Sesión</h4>
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
                <div class="bmd-form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">email</i>
                            </span>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" autocomplete="email" autofocus required
                            placeholder="{{ __('E-Mail Address') }}">

                        @error('email')
                        <span class="invalid-feedback ml-4" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="bmd-form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">lock_outline</i>
                            </span>
                        </div>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            autocomplete="current-password" required placeholder="{{ __('Password') }}">
                        @error('password')
                        <span class="invalid-feedback ml-4" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="bmd-form-group">
                    <div class="form-group row">
                        <div class="col-md-12 ml-2 mt-3">
                            <div class="form-check">
                                <label class="form-check-label" for="remember">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer justify-content-center">
                <div class="form-group row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Iniciar Sesión') }}
                        </button>

                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('auth-js')
<script src="{{asset('js/login.js')}}"></script>
<script>
    $(document).ready(function() {
        ValidarFormulario('#form_login');
        md.checkFullPageBackgroundImage();
        setTimeout(function() {
            $('.card').removeClass('card-hidden');
        }, 700);
    });
</script>
@endsection