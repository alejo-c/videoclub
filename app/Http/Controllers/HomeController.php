<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
	public function getHome()
	{
		if (Auth::check()) {
			return redirect()->action([CatalogController::class, 'getIndex']);
		} else {
			return redirect()->action([AuthenticatedSessionController::class, 'create']);
		}
	}
}
