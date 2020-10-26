@extends('auth.plantilla-auth')

@section('titulo',__('Verify Your Email Address'))

@section('pagina-active')
<a class="navbar-brand" href="{{route('login')}}">Verifica tu correo</a>
@endsection

@section('img-fondo'){{"'".asset('img/app/registro.jpg')."'"}}
@endsection

@section('formulario')
<div class="col-lg-5 col-md-6 col-sm-8 ml-auto mr-auto">
    <div class="card card-login card-hidden">
        <div class="card-header card-header-rose text-center">
            <h4 class="card-title">{{ __('Verify Your Email Address') }}</h4>
        </div>
        <div class="card-bod">
            @if (session('resent'))
            <div class="alert alert-success m-2 text-center" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
            @endif
            <div class="card-description text-center">
                {{ __('Before proceeding, please check your email for a verification link.') }}
            </div>
            <div class="card-description text-center">{{ __('If you did not receive the email') }}</div>
            <form class="d-flex justify-content-center mt-3 mb-3" method="POST"
                action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-primary">{{ __('click here to request another') }}</button>.
            </form>
        </div>
    </div>
</div>
@endsection

@section('auth-js')
<script>
    $(document).ready(function() {
        md.checkFullPageBackgroundImage();
        setTimeout(function() {
            $('.card').removeClass('card-hidden');
        }, 700);
    });
</script>
@endsection
