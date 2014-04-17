{{ Form::open(array('url' => 'ubicacion/' . $ubicacion->id, 'method' => 'put')) }}
{{ Form::text('descripcion', $ubicacion->descripcion) }} <br />
{{ Form::submit('Guardar') }}
{{ Form::close() }}

<a href={{ URL::to("ubicacion") }}>Volver</a>