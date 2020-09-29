<?php

namespace App\Http\Controllers;

use App\NewsLetter;

class NewsLetterController extends Controller
{
	public function __construct()
	{
		$this->newsletter = new Newsletter();
	}


	public function index()
	{
		$newsletters = $this->newsletter::all();

		return view('pages.admin.newsletter', compact('newsletters'));
	}
}
