<?php

namespace App\Http\Controllers;

use App\Voluntary;
use Illuminate\Support\Facades\Auth;

class VoluntaryController extends Controller
{
	public function __construct()
	{
		$this->voluntary = new Voluntary();
	}


	public function index()
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$voluntaries = $this->voluntary::all();

		return view('pages.admin.voluntary', compact('voluntaries'));
	}
}
