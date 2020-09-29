<?php

namespace App\Http\Controllers;

use App\WorkUs;

class WorkUsController extends Controller
{
	public function __construct()
	{
		$this->work = new WorkUs();
	}


	public function index()
	{
		$works = $this->work::all();

		return view('pages.admin.workus', compact('works'));
	}



}
