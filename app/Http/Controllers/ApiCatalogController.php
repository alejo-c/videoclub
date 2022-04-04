<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Exception;
use Illuminate\Http\Request;

class ApiCatalogController extends Controller
{
	private $fields = ['title', 'year', 'director', 'poster', 'rented', 'synopsis'];

	public function index()
	{
		$response = Movie::all();
		if (empty($response)) {
			$response = [
				'error' => true,
				'message' => 'Catalog does not have movies'
			];
		}
		return response()->json($response);
	}

	public function show($id)
	{
		try {
			$response = Movie::findOrFail($id);
		} catch (\Throwable $th) {
			$response = [
				'error' => true,
				'message' => "Movie with id: $id does not exists"
			];
		}
		return response()->json($response);
	}

	public function store(Request $request)
	{
		$movie = new Movie;
		$this->fillMovie($movie, $request);
		return response()->json([
			'error' => false,
			'message' => "Movie created successfully with id: $movie->id"
		]);
	}

	public function update(Request $request, $id)
	{
		try {
			$movie = Movie::findOrFail($id);
			$this->fillMovie($movie, $request);
			$response = [
				'error' => false,
				'message' => "Movie with id: $movie->id updated successfully"
			];
		} catch (\Throwable $th) {
			$response = [
				'error' => true,
				'message' => "Movie with id: $id does not exists"
			];
		}
		return response()->json($response);
	}

	public function rent($id)
	{
		try {
			$request = new Request();
			$request->query->add(['rented' => true]);

			$movie = Movie::findOrFail($id);
			$response = [
				'error' => true,
				'message' => "Movie with id: $movie->id already rented"
			];
			if (!$movie->rented) {
				$this->fillMovie($movie, $request);
				$response = [
					'error' => false,
					'message' => "Movie with id: $movie->id rented successfully"
				];
			}
		} catch (\Throwable $th) {
			$response = [
				'error' => true,
				'message' => "Movie with id: $id does not exists"
			];
		}
		return response()->json($response);
	}

	public function return($id)
	{
		try {
			$request = new Request;
			$request->query->add(['rented' => false]);

			$movie = Movie::findOrFail($id);
			$response = [
				'error' => true,
				'message' => "Movie with id: $movie->id is not rented"
			];
			if ($movie->rented) {
				$this->fillMovie($movie, $request);
				$response = [
					'error' => false,
					'message' => "Movie with id: $movie->id returned successfully"
				];
			}
		} catch (\Throwable $th) {
			$response = [
				'error' => true,
				'message' => "Movie with id: $id does not exists"
			];
		}
		return response()->json($response);
	}

	public function fillMovie($movie, Request $request)
	{
		foreach ($this->fields as $field) {
			if ($request->has($field)) {
				$movie->$field = $request->$field;
			}
		}
		$movie->save();
	}

	public function destroy($id)
	{
		try {
			$movie = Movie::findOrFail($id);
			$movie->delete();
			$response = [
				'error' => false,
				'message' => "Movie with id: $movie->id deleted successfully"
			];
		} catch (\Throwable $th) {
			$response = [
				'error' => true,
				'message' => "Movie with id: $id does not exists"
			];
		}
		return response()->json($response);
	}
}
