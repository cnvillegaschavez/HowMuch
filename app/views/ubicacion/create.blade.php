<h2>Nueva ubicacion</h2>
@if ( $errors->count() > 0 )
	<p>The following errors have occurred:</p>

	<ul>
		@foreach( $errors->all() as $message )
        	<li>{{ $message }}</li>
		@endforeach
    </ul>
@endif
{{ Form::open(array('url' => 'ubicacion')) }}
{{ Form::text('descripcion') }} <br />
{{ $errors->first('descripcion'); }}
{{ Form::submit('Guardar') }}
{{ Form::close() }}

<a href={{ URL::to("ubicacion") }}>Volver</a>