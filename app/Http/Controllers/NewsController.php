<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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


	public function index()
	{
		$news = $this->new::all();
		return view('pages.admin.news', compact('news'));
	}

	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'logo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
		]);

		$this->news->title = $request->input('title');
		$this->news->author = $request->input('author');
		$this->news->author_image = $request->input('author_image');
		$this->news->content = $request->input('content');
		$this->news->image = $request->input('image');
		$this->news->is_posted = $request->input('is_posted');
	}
}
