<?php

namespace App\Http\Controllers;

use App\News;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
	use UploadTrait;

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


	public function getNewsPublished()
	{
		$news = $this->news::where('is_posted', 1)->get();
		return view('pages.admin.news.index', compact('news'));
	}

	public function getNewsUnpublished()
	{
		$news = $this->news::where('is_posted', 0)->get();
		return view('pages.admin.news.index', compact('news'));
	}

	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'title' => 'required',
			'author' => 'required|exists:App\Author,id',
			'content' => 'required',
			'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
		]);

		if ($validator->fails()) {
			toastr()->error('Problemas al cargar el formulario, por favor intentar nuevamente.');
			return back();
		}

		if ($request->has('image')) {
			$image = $request->file('image');
			$folder = '/img/news/';
			$name = Str::slug($image->hashName());
			$filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
			$this->uploadOne($image, $folder, 'public', $name);

			$this->news->title = $request->input('title');
			$this->news->author_id = $request->input('author');
			$this->news->content = $request->input('content');
			$this->news->image = $filePath;
			$this->news->save();
		}

		toastr()->success('Se creó correctamente');
		return back();
	}
}
