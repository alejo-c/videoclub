<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
use App\Models\Movie;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
	private $movies;

	public function run()
	{
		self::seedCatalog();
		self::seedUsers();
	}

	public function seedCatalog()
	{
		$this->movies = json_decode(file_get_contents(storage_path() . "/movies.json"), true)['movies'];
		Movie::truncate();
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
		$this->command->info('Catalog table initialized with data.');
	}

	public function seedUsers()
	{
		User::truncate();
		$test_users = [
			['name' => 'testuser1', 'email' => 'email1@test.com', 'password' => bcrypt('testpasswd')],
			['name' => 'testuser2', 'email' => 'email2@test.com', 'password' => bcrypt('testpasswd')],
			['name' => 'alejo', 'email' => 'alejo@mail.com', 'password' => bcrypt('testpasswd')],
			['name' => 'nestor', 'email' => 'nestor@mail.com', 'password' => bcrypt('testpasswd')]
		];
		foreach ($test_users as $test_user) {
			$new_user = new User;
			$new_user->name = $test_user['name'];
			$new_user->email = $test_user['email'];
			$new_user->password = $test_user['password'];
			$new_user->save();
		}
		$this->command->info('Users table initialized with data.');
	}
}
