<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessionalController extends Controller
{
	public function __construct()
	{
	}

	public function getDetail($id)
	{
		return view('pages.detail', compact('id'));
	}
}
