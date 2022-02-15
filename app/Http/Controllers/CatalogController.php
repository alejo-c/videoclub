<?php

namespace App\Http\Controllers;

class CatalogController extends Controller
{
	public function getIndex()	
	{
		$movies = $this->loadMovies();
		return view('catalog.index', ['movies' => $movies]);
	}

	public function getShow($id)
	{
		$movie = $this->loadMovies()[$id];
		return view('catalog.show', ['id' => $id, 'movie' => $movie]);
	}

	public function getCreate()
	{
		return view('catalog.create');
	}

	public function getEdit($id)
	{
		$movie = $this->loadMovies()[$id];
		return view('catalog.edit', ['id' => $id, 'movie' => $movie]);
	}

	private function loadMovies()
	{
		return json_decode(file_get_contents(storage_path() . "/movies.json"), true)['movies'];
	}
}
