<span>Detalles de ubicacion</span>
<h1>{{ $ubicacion->descripcion }}</h1>
<h4>Created at : {{ $ubicacion->created_at }}</h4>
<h4>Updated at : {{ $ubicacion->updated_at }}</h4>

<a href="{{ $ubicacion->id }} /edit" >Editar</a>
{{ Form::open(array('url' => 'ubicacion/' . $ubicacion->id, 'method' => 'delete')) }}
{{ Form::submit('Eliminar') }}
{{ Form::close() }}