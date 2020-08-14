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

	public function getNews($id = null)
	{
		if (!is_null($id)) {
			$rows = $this->news::find($id);
		} else {

			$rows = $this->news::paginate();
		}


		return response()->json($rows);
	}

	public function getDetail($id)
	{
		return view("pages.news-detail", compact('id'));
	}
}
