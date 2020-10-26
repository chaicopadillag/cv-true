@extends('auth.plantilla-auth')

@section('titulo', __('Reset Password'))

@section('pagina-active')
<a class="navbar-brand" href="#">{{ __('Reset Password') }}</a>
@endsection

@section('img-fondo'){{"'".asset('img/app/login.jpg')."'"}}
@endsection

@section('formulario')
<div class="col-lg-5 col-md-6 col-sm-8 ml-auto mr-auto">
    <form class="form" method="POST" action="{{ route('password.email') }}" id="form_email">
        @csrf
        <div class="card card-login card-hidden">
            <div class="card-header card-header-rose text-center">
                <h4 class="card-title">{{ __('Reset Password') }}</h4>
            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success text-center ml-3" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <p class="card-description text-center">{{ __('Send Password Reset Link') }}</p>
                <div class="bmd-form-group form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">email</i>
                            </span>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="{{ __('E-Mail Address') }}">

                        @error('email')
                        <span class="invalid-feedback ml-3" role="alert">
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
                            {{__('Restablecer')}}
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
    $("#form_email").validate({
    rules: {
    email: {
    required: true,
    minlength: 3,
    maxlength: 30
    },
    password: {
    required: true
    }
    },
    highlight: function(element) {
    $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
    $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
    },
    success: function(element) {
    $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
    $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
    },
    errorPlacement: function(error, element) {
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
