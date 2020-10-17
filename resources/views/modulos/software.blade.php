@extends('plantilla')
@section('titulo','Software')

@section('contenido')
<div class="row">
    <div class="col-md-8 col-lg-6">
		<form action="{{ $software!=null? route('software.update',$software->id_software) :route('software.store')}}" class="form" method="post" id="formSoftware">
			@if ($software!=null)
				@method('PUT')
			@endif
			@csrf
	        <div class="card">
	            <div class="card-header card-header-rose card-header-icon">
	                <div class="card-icon">
	                    <i class="material-icons">desktop_mac</i>
	                </div>
	                <h4 class="card-title d-inline-block">Software - <small class="category">Mis Software's y Herramientas</small></h4>

	            </div>
	            <div class="card-body">
	            	<p class="text-muted text-center">Agrega todos los software's y herramientas que utilizas para desempeñerte en tu trabajo. <span class="text-danger">Separados por coma (,)</span>.</p>
	            	<p class="text-primary">Ejemplo:</p>
	            	<p>
	            		<span class="badge badge-success">Excel</span>
	            		<span class="badge badge-info">Photoshop</span>
	            		<span class="badge badge-dark">Visual Studio Code</span>
	            		<span class="badge badge-danger">Android Studio</span>
	            		<span class="badge badge-warning">AutoCat</span>
	            		<span class="badge badge-secondary">...</span>
	            	</p>
					    <div class="form-group">
				            <label class="bmd-label-floating" for="softwares">Mis herramientas</label>
				            @php
				            if (isset($software->softwares)){
				            	$herramientas=json_decode($software->softwares,true);
				            	$mis_softwares='';
				            	foreach ($herramientas as $soft){
				            		$mis_softwares.=$soft.', ';
				            	}
				            }else{
				            	$mis_softwares='';
				            }
				            @endphp
				            <input type="text" name="softwares" id="softwares" value="{{$mis_softwares?? old('softwares')}}" class="form-control tagsinput"
                        data-role="tagsinput" data-color="primary">
					        @error('softwares')
					        <label class="error ml-3 d-block" for="softwares">{{$message}}</label>
					        @enderror
					    </div>
					    <div class="text-center">
					        <button class="btn btn-primary float-right mt-4" type="submit">
						    	@if ($software!=null)
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
<script src="{{ asset('js/software.js')}}" type="text/javascript" charset="utf-8" async defer></script>
<script type="text/javascript">
	{{-- save --}}
	@if (session('save-success-software'))
	    swal({
	title: '¡Buen trabajo!',
	text: '{{session("save-success-software")}}',
	buttonsStyling: false,
	confirmButtonClass: 'btn btn-success',
	type: 'success'
	}).catch(swal.noop);
	@endif

	@if (session('save-error-software'))
	    swal({
	title: '¡Ups, algo salio mal!',
	text: '{{session("save-error-software")}}',
	buttonsStyling: false,
	confirmButtonClass: 'btn btn-danger',
	type: 'danger'
	}).catch(swal.noop);
	@endif
	{{-- update --}}
	@if (session('update-success-software'))
	swal({
	title: '¡Buen trabajo!',
	text: '{{session("update-success-software")}}',
	buttonsStyling: false,
	confirmButtonClass: 'btn btn-success',
	type: 'success'
	}).catch(swal.noop);
	@endif

	@if (session('error-update-contactos'))
	swal({
	title: '¡Ups, algo salio mal!',
	text: '{{session("update-error-software")}}',
	buttonsStyling: false,
	confirmButtonClass: 'btn btn-danger',
	type: 'danger'
	}).catch(swal.noop);
	@endif
</script>
@endsection