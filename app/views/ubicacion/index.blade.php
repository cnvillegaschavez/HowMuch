@extends('layout')

@section('content')

<a href={{ URL::to("ubicacion/create") }}>Nueva ubicacion</a>

<div class="search">
	{{ Form::model(null, array('route' => array('ubicacion.search'))) }}
	{{ Form::text('query', null, array( 'placeholder' => 'Search ...' )) }}
	{{ Form::submit('Search') }}
	{{ Form::close() }}
</div>

<ul>
	@foreach($ubicaciones as $ubicacion)
	<li><a href={{ URL::to("ubicacion/$ubicacion->id/edit") }}>{{ $ubicacion->descripcion }}</a></li>	
	@endforeach
</ul>

@stop