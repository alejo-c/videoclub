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
			<form method="POST" action='{{ url("catalog/return/$movie->id") }}' style="display: inline;">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<button class="btn btn-success" type="submit">
					Devolver Película
				</button>
			</form>
			@else
			<form method="POST" action='{{ url("catalog/rent/$movie->id") }}' style="display: inline;">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<button class="btn btn-primary" type="submit">
					Alquilar
				</button>
			</form>
			@endif

			<a href='{{ url("catalog/edit/$movie->id" ) }}' class="btn btn-warning">
				<div class="text-white">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
						<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
					</svg>
					Editar
				</div>
			</a>

			<form method="POST" action='{{ url("catalog/delete/$movie->id") }}' style="display: inline;">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
				<button class="btn btn-danger" type="submit">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
						<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
					</svg>
					Eliminar
				</button>
			</form>

			<a href="{{ url('catalog') }}" class="btn btn-light">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
					<path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
				</svg>
				Volver
			</a>
		</div>
	</div>
</div>
@stop