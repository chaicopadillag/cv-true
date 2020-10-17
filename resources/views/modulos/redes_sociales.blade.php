@extends('plantilla')
@section('titulo','Contactos')

@section('contenido')
<div class="row">
    <div class="col-md-8 col-lg-6">
		<form action="{{ $redes!=null? route('contactos.update',$redes->id_red_social) :route('contactos.store')}}" class="form" method="post" id="formRedesSociales">
			@if ($redes!=null)
				@method('PUT')
			@endif
			@csrf
	        <div class="card">
	            <div class="card-header card-header-rose card-header-icon">
	                <div class="card-icon">
	                    <i class="material-icons">contacts</i>
	                </div>
	                <h4 class="card-title d-inline-block">Contactos - <small class="category">Mis redes sociales</small></h4>

	            </div>
	            <div class="card-body">
	            	<p class="text-muted text-center">Pega los links de tus redes sociales</p>
					    <div class="form-group">
					        <div class="input-group">
					            <div class="input-group-prepend">
					                <span class="input-group-text">
					                    <i class="material-icons">
					                        link
					                    </i>
					                </span>
					            </div>
					            <label class="bmd-label-floating sr-only">Página web</label>
					            <input class="form-control" placeholder="Página web" type="text" name="pagina_web" id="pagina_web" value="{{$redes->pagina_web ?? old('pagina_web')}}">
					            <div class="input-group-prepend">
					                <span class="input-group-text">
					                    <span>Página web</span>
					                </span>
					            </div>
					        </div>
					        @error('pagina_web')
					        <label class="error ml-3" for="pagina_web">{{$message}}</label>
					        @enderror
					    </div>
					    <div class="form-group has-default">
					        <div class="input-group">
					            <div class="input-group-prepend">
					                <span class="input-group-text">
					                    <i class="material-icons icon-linkedin">
					                    </i>
					                </span>
					            </div>
					            <label class="bmd-label-floating sr-only">Linkedin</label>
					            <input class="form-control" placeholder="Linkedin" type="text" name="linkedin" id="linkedin" value="{{$redes->linkedin ?? old('linkedin')}}">
					            <div class="input-group-prepend">
					                <span class="input-group-text">
					                    <span>Linkedin</span>
					                </span>
					            </div>
					        </div>
					        @error('linkedin')
					        <label class="error ml-3" for="linkedin">{{$message}}</label>
					        @enderror
					    </div>
					    <div class="form-group has-default">
					        <div class="input-group">
					            <div class="input-group-prepend">
					                <span class="input-group-text">
					                    <i class="material-icons icon-facebook">
					                    </i>
					                </span>
					            </div>
					            <label class="bmd-label-floating sr-only">Facebook</label>
					            <input class="form-control" placeholder="Facebook" type="text" name="facebook" id="facebook" value="{{$redes->facebook ?? old('facebook')}}">
					            <div class="input-group-prepend">
					                <span class="input-group-text">
					                    <span>Facebook</span>
					                </span>
					            </div>
					        </div>
					        @error('facebook')
					        <label class="error ml-3" for="facebook">{{$message}}</label>
					        @enderror
					    </div>
					    <div class="form-group has-default">
					        <div class="input-group">
					            <div class="input-group-prepend">
					                <span class="input-group-text">
					                    <i class="material-icons icon-google-plus">
					                    </i>
					                </span>
					            </div>
					            <label class="bmd-label-floating sr-only">Instagram</label>
					            <input class="form-control" placeholder="Instagram" type="text" name="instagram" id="instagram" value="{{$redes->instagram ?? old('instagram')}}">
					            <div class="input-group-prepend">
					                <span class="input-group-text">
					                    <span>Instagram</span>
					                </span>
					            </div>
					        </div>
					        @error('instagram')
					        <label class="error ml-3" for="instagram">{{$message}}</label>
					        @enderror
					    </div>
					    <div class="form-group has-default">
					        <div class="input-group">
					            <div class="input-group-prepend">
					                <span class="input-group-text">
					                    <i class="material-icons icon-twitter">
					                    </i>
					                </span>
					            </div>
					            <label class="bmd-label-floating sr-only">Twitter</label>
					            <input class="form-control" placeholder="Twitter" type="text" name="twitter" id="twitter" value="{{$redes->twitter ?? old('twitter')}}">
					            <div class="input-group-prepend">
					                <span class="input-group-text">
					                    <span>Twitter</span>
					                </span>
					            </div>
					        </div>
					        @error('twitter')
					        <label class="error ml-3" for="twitter">{{$message}}</label>
					        @enderror
					    </div>
					    <div class="form-group has-default">
					        <div class="input-group">
					            <div class="input-group-prepend">
					                <span class="input-group-text">
					                    <i class="material-icons icon-tumblr">
					                    </i>
					                </span>
					            </div>
					            <label class="bmd-label-floating sr-only">Tumblr</label>
					            <input class="form-control" placeholder="Tumblr" type="text" name="tumblr" id="tumblr" value="{{$redes->tumblr ?? old('tumblr')}}">
					            <div class="input-group-prepend">
					                <span class="input-group-text">
					                    <span>Tumblr</span>
					                </span>
					            </div>
					        </div>
					        @error('tumblr')
					        <label class="error ml-3" for="tumblr">{{$message}}</label>
					        @enderror
					    </div>
					    <div class="form-group has-default">
					        <div class="input-group">
					            <div class="input-group-prepend">
					                <span class="input-group-text">
					                    <i class="material-icons icon-pinterest">
					                    </i>
					                </span>
					            </div>
					            <label class="bmd-label-floating sr-only">Pinterest</label>
					            <input class="form-control" placeholder="Pinterest" type="text" name="pinterest" id="pinterest" value="{{$redes->pinterest ?? old('pinterest')}}">
					            <div class="input-group-prepend">
					                <span class="input-group-text">
					                    <span>Pinterest</span>
					                </span>
					            </div>
					        </div>
					        @error('pinterest')
					        <label class="error ml-3" for="pinterest">{{$message}}</label>
					        @enderror
					    </div>
					    <div class="form-group has-default">
					        <div class="input-group">
					            <div class="input-group-prepend">
					                <span class="input-group-text">
					                    <i class="material-icons icon-spotify">
					                    </i>
					                </span>
					            </div>
					            <label class="bmd-label-floating sr-only">Spotify</label>
					            <input class="form-control" placeholder="Spotify" type="text" name="spotify" id="spotify" value="{{$redes->spotify ?? old('spotify')}}">
					            <div class="input-group-prepend">
					                <span class="input-group-text">
					                    <span>Spotify</span>
					                </span>
					            </div>
					        </div>
					        @error('spotify')
					        <label class="error ml-3" for="spotify">{{$message}}</label>
					        @enderror
					    </div>
					    <div class="form-group has-default">
					        <div class="input-group">
					            <div class="input-group-prepend">
					                <span class="input-group-text">
					                    <i class="material-icons icon-spotify">
					                    </i>
					                </span>
					            </div>
					            <label class="bmd-label-floating sr-only">TikTok</label>
					            <input class="form-control" placeholder="TikTok" type="text" name="tiktok" id="tiktok" value="{{$redes->tiktok ?? old('tiktok')}}">
					            <div class="input-group-prepend">
					                <span class="input-group-text">
					                    <span>TikTok</span>
					                </span>
					            </div>
					        </div>
					        @error('tiktok')
					        <label class="error ml-3" for="tiktok">{{$message}}</label>
					        @enderror
					    </div>
					    <div class="text-center">
					        <button class="btn btn-primary float-right mt-4" type="submit">
						    	@if ($redes!=null)
						            {{__('Actualizar')}}
						        @else
						        	{{__('Guardar')}}
						    	@endif
					        </button>

					    </div>
	            </div>
	        </div>
		</form>
    </div>
</div>
@endsection

@section('js')
@parent
<script src="{{ asset('js/contactos.js')}}" type="text/javascript" charset="utf-8" async defer></script>
<script type="text/javascript">
	{{-- save --}}
	@if (session('success-save-contactos'))
	    swal({
	title: '¡Buen trabajo!',
	text: '{{session("success-save-contactos")}}',
	buttonsStyling: false,
	confirmButtonClass: 'btn btn-success',
	type: 'success'
	}).catch(swal.noop);
	@endif

	@if (session('error-save-contactos'))
	    swal({
	title: '¡Ups, algo salio mal!',
	text: '{{session("error-save-contactos")}}',
	buttonsStyling: false,
	confirmButtonClass: 'btn btn-danger',
	type: 'danger'
	}).catch(swal.noop);
	@endif
	{{-- update --}}
	@if (session('success-update-contactos'))
	swal({
	title: '¡Buen trabajo!',
	text: '{{session("success-update-contactos")}}',
	buttonsStyling: false,
	confirmButtonClass: 'btn btn-success',
	type: 'success'
	}).catch(swal.noop);
	@endif

	@if (session('error-update-contactos'))
	swal({
	title: '¡Ups, algo salio mal!',
	text: '{{session("error-update-contactos")}}',
	buttonsStyling: false,
	confirmButtonClass: 'btn btn-danger',
	type: 'danger'
	}).catch(swal.noop);
	@endif
</script>
@endsection