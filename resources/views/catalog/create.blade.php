@extends('layouts.master')

@section('content')
<div class="row" style="margin-top:40px">
	<div class="offset-md-3 col-md-6">

		<div class="card">
			<div class="card-header text-center">
				Añadir película
			</div>

			<div class="card-body" style="padding:30px">
				<form action="{{ url('/catalog/create/') }}" method="POST">
					{{ csrf_field() }}

					<div class="form-group">
						<label for="title">Título</label>
						<input type="text" name="title" class="form-control">
					</div>

					<div class="form-group">
						<label for="title">Año</label>
						<input type="text" name="year" class="form-control">
					</div>

					<div class="form-group">
						<label for="title">Director</label>
						<input type="text" name="director" class="form-control">
					</div>

					<div class="form-group">
						<label for="title">Poster (URL)</label>
						<input type="text" name="poster" class="form-control">
					</div>

					<div class="form-group">
						<label for="synopsis">Resumen</label>
						<textarea name="synopsis" class="form-control" rows="3"></textarea>
					</div>

					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
							Añadir película
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@stop