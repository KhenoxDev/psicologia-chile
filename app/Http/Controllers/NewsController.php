<?php

namespace App\Http\Controllers;

use App\News;
use App\Author;
use Carbon\Carbon;
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
		$this->author = new Author();
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
		$title = "Noticias publicadas";
		$news = $this->news::where('is_posted', 1)->get();
		return view('pages.admin.news.index', compact('news', 'title'));
	}

	public function getNewsUnpublished()
	{
		$title = "Noticias sin publicar";
		$news = $this->news::where('is_posted', 0)->get();
		return view('pages.admin.news.index', compact('news', 'title'));
	}

	public function newsDestroy($id)
	{
		$delete = $this->news::find($id);
		if (@getimagesize(public_path() . $delete->image)) {
			unlink(public_path() . $delete->image);
			$delete->delete();

			toastr()->success('Se eliminó la imagen y el registro correctamente');
			return back();
		} else {
			$delete->delete();

			toastr()->warning('Se eliminó el registro correctamente pero la imagen no pudo encontrarse');
			return back();
		}
	}

	public function edit($id)
	{
		$news = $this->news::find($id);
		$authors = $this->author::all();

		return view('pages.admin.news.up', compact('news', 'authors'));
	}

	public function update(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'title' => 'required',
			'author' => 'required|exists:App\Author,id',
			'content' => 'required'
		]);

		if ($validator->fails()) {
			toastr()->error('Hubo errores en el formulario. Por favor, intentar nuevamente.');
			return back();
		}

		$current = $this->news::find($request->input('id'));
		$current->title = $request->input('title');
		$current->author_id = $request->input('author');
		$current->content = $request->input('content');

		if ($request->has('image')) {
			if (@getimagesize(public_path() . $current->image)) {
				unlink(public_path() . $current->image);
			}
			$image = $request->file('image');
			$folder = '/img/news/';
			$name = Str::slug($image->hashName());
			$filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
			$this->uploadOne($image, $folder, 'public', $name);

			$current->image = $filePath;
		}

		$current->save();

		toastr()->success('Se actualizó correctamente');
		return back();
	}

	public function newsPublished($id)
	{
		$now = Carbon::now('America/Santiago');
		$news = $this->news::find($id);
		$news->is_posted = 1;
		$news->posted_on = $now;
		$news->updated_at = $now;
		$news->save();

		toastr()->success('Se publicó la noticia');
		return back();
	}

	public function newsUnpublished($id)
	{
		$now = Carbon::now('America/Santiago');
		$news = $this->news::find($id);
		$news->is_posted = 0;
		$news->posted_on = null;
		$news->updated_at = $now;
		$news->save();

		toastr()->success('Se quito la publicación de tu noticia');
		return back();
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
