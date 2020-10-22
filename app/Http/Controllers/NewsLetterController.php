<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Support\Facades\Auth;

class NewsletterController extends Controller
{
	public function __construct()
	{
		$this->newsletter = new Newsletter();
	}


	public function index()
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$newsletters = $this->newsletter::all();

		return view('pages.admin.newsletter', compact('newsletters'));
	}
}
