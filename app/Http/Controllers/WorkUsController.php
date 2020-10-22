<?php

namespace App\Http\Controllers;

use App\WorkUs;
use Illuminate\Support\Facades\Auth;

class WorkUsController extends Controller
{
	public function __construct()
	{
		$this->work = new WorkUs();
	}


	public function index()
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$works = $this->work::all();

		return view('pages.admin.workus', compact('works'));
	}
}
