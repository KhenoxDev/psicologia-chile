<?php

namespace App\Http\Controllers;

use App\Voluntary;

class VoluntaryController extends Controller
{
	public function __construct()
	{
		$this->voluntary = new Voluntary();
	}


	public function index()
	{
		$voluntaries = $this->voluntary::all();

		return view('pages.admin.voluntary', compact('voluntaries'));
	}
}
