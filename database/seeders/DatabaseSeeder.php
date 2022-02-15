<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
	private $movies;
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		// \App\Models\User::factory(10)->create();
		self::seedCatalog();
		$this->command->info('Tabla catálogo inicializada con datos!');
	}

	public function seedCatalog()
	{
		$this->	movies = json_decode(file_get_contents(storage_path() . "/movies.json"), true)['movies'];
		DB::table('movies')->delete();
		foreach ($this->movies as $movie) {
			$newMovie = new Movie;

			$newMovie->title = $movie['title'];
			$newMovie->year = $movie['year'];
			$newMovie->director = $movie['director'];
			$newMovie->poster = $movie['poster'];
			$newMovie->rented = $movie['rented'];
			$newMovie->synopsis = $movie['synopsis'];
			$newMovie->save();
		}
	}
}
