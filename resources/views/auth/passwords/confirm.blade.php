@extends('auth.plantilla-auth')

@section('titulo', __('Confirm Password'))

@section('pagina-active')
<a class="navbar-brand" href="#">{{__('Confirma tu contraseña')}}</a>
@endsection

@section('img-fondo'){{"'".asset('img/app/registro.jpg')."'"}}
@endsection

@section('formulario')
<div class="col-lg-5 col-md-6 col-sm-8 ml-auto mr-auto">
    <form class="form" method="POST" action="{{ route('password.confirm') }}" id="confirm_password">
        @csrf
        <div class="card card-login card-hidden">
            <div class="card-header card-header-rose text-center">
                <h4 class="card-title">{{__('Confirm Password')}}</h4>
            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <p class="card-description text-center">{{ __('Please confirm your password before continuing.') }}</p>
                <div class="bmd-form-group form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">lock_outline</i>
                            </span>
                        </div>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password" placeholder="{{__('Password') }}">

                        @error('password')
                        <span class="invalid-feedback ml-5" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer justify-content-center">
                <div class="row mt-3 w-100">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block w-100">
                            {{__('Confirm Password')}}
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
    $("#confirm_password").validate({
    rules: {
    password: {
    required: true
    }
    },
    highlight: function (element) {
    $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
    $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
    },
    success: function (element) {
    $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
    $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
    },
    errorPlacement: function (error, element) {
    $(element).closest('.form-group').append(error);
    }
    });

    $(document).ready(function() {
        md.checkFullPageBackgroundImage();
        setTimeout(function() {
            $('.card').removeClass('card-hidden');
        }, 700);
    });
</script>
@endsection
