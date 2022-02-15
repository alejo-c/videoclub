@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-xl-4">
		<img src="{{ $movie->poster }}" style="height:400px" />
	</div>

	<div class="col-xl-8">
		<div>
			<h1>{{ $movie->title }}</h1>
			<h4>Año: {{ $movie->year }}</h4>
			<h4>Director: {{ $movie->director }}</h4>
			<br>
			<p>
				<strong>Resumen:</strong>
				{{ $movie->synopsis }}
			</p>
			<br>
			<p>
				<strong>Estado:</strong>
				Película
				@if ( $movie->rented )
				actualmente alquilada
				@else
				disponible
				@endif
			</p>
		</div>

		<div class="d-inline">
			@if ( $movie->rented )
			<a class="btn btn-danger">
				Devolver Película
			</a>
			@else
			<a class="btn btn-success">
				Alquilar Película
			</a>
			@endif

			{{-- action('App\Http\Controllers\CatalogController@getEdit', [$id]) --}}
			<a href="{{ url('catalog/edit/{$movie->id}' ) }}" class="btn btn-warning">
				<div class="text-white">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
						<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
					</svg>
					Editar Película
				</div>
			</a>

			<a href="{{ url('catalog') }}" class="btn btn-light">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
					<path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
				</svg>
				Volver al listado
			</a>
		</div>
	</div>
</div>
@stop