<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class CatalogController extends Controller
{
	public function getIndex() 
	{
		$movies = Movie::all();
		return view('catalog.index', ['movies' => $movies]);
	}

	public function getShow($id)
	{
		$movie = Movie::findOrFail($id);
		return view('catalog.show', ['movie' => $movie]);
	}

	public function getCreate()
	{
		return view('catalog.create');
	}

	public function getEdit($id)
	{
		$movie = Movie::findOrFail($id);
		return view('catalog.edit', ['movie' => $movie]);
	}
}
