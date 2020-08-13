<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
	public function __construct()
	{
		$this->news = new News();
	}

	public function getNews()
	{
		$rows = $this->news::paginate();

		return response()->json($rows);
	}
}
