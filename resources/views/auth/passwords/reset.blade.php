@extends('auth.plantilla-auth')

@section('titulo',__('Reset Password'))

@section('pagina-active')
<a class="navbar-brand" href="#">{{ __('Reset Password') }}</a>
@endsection

@section('img-fondo'){{"'".asset('img/app/login.jpg')."'"}}
@endsection

@section('formulario')
<div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
    <form class="form" method="POST" action="{{ route('password.update') }}" id="form_rest">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="card card-login card-hidden">
            <div class="card-header card-header-rose text-center">
                <h4 class="card-title">{{__('Reset Password')}}</h4>
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
                    <div class="input-group form-group">
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
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">lock_outline</i>
                            </span>
                        </div>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}"
                            equalTo='#password'>
                        @error('password_confirmation')
                        <span class="invalid-feedback ml-4" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer justify-content-center">
                <div class="form-group row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('auth-js')
<script>
    $("#form_rest").validate({
    rules: {
        email: {
            required: true,
            minlength: 3,
            maxlength: 30
        },
        password: {
            required: true,
            minlength:8,
            maxlength:255
        },
        password_confirmation:{
            required: true,
            minlength:8,
            maxlength:255
        }
    },
    highlight: function(element) {
        $(element)
            .closest(".form-group")
            .removeClass("has-success")
            .addClass("has-danger");
    },
    success: function(element) {
        $(element)
            .closest(".form-group")
            .removeClass("has-danger")
            .addClass("has-success");
    },
    errorPlacement: function(error, element) {
        $(element).append(error);
    }
    });

    $(document).ready(function() {
        ValidarFormulario('#form_rest');
        md.checkFullPageBackgroundImage();
        setTimeout(function() {
            $('.card').removeClass('card-hidden');
        }, 700);
    });
</script>
@endsection