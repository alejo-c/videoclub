<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\DB;
use App\Models\Movie;

class CatalogController extends Controller
{
	public function getIndex() 
	{
		// $movies = DB::table('movies')->get();
		$movies = Movie::all();
		return view('catalog.index', ['movies' => $movies]);
	}

	public function getShow($id)
	{
		// $movies = DB::table('movies')->where('id', $id)->get();
		$movie = Movie::findOrFail($id);
		return view('catalog.show', ['movie' => $movie]);
	}

	public function getCreate()
	{
		return view('catalog.create');
	}

	public function getEdit($id)
	{
		// $movies = DB::table('movies')->where('id', $id)->get();
		$movie = Movie::findOrFail($id);
		return view('catalog.edit', ['movie' => $movie]);
	}
}
