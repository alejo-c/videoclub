<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

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

	public function postCreate(Request $req)
	{
		$movie = new Movie;
		$movie->title = $req->input('title');
		$movie->year = $req->input('year');
		$movie->director = $req->input('director');
		$movie->poster = $req->input('poster');
		$movie->rented = false;
		$movie->synopsis = $req->input('synopsis');
		if ($movie->save()) {
			return redirect()->route("catalog");
		} else {
			return ['result' => 'error'];
		}
	}

	public function putEdit(Request $req, $id)
	{
		$movie = Movie::findOrFail($id);
		$movie->title = $req->input('title');
		$movie->year = $req->input('year');
		$movie->director = $req->input('director');
		$movie->poster = $req->input('poster');
		$movie->synopsis = $req->input('synopsis');
		if ($movie->save()) {
			return redirect()->route("catalog/show", ["id" => $id]);
		} else {
			return ['result' => 'error'];
		}
	}
}
