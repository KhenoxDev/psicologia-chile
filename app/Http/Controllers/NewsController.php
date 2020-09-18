<?php

namespace App\Http\Controllers;

use App\News;
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
			'author' => 'required',
			'author_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
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

			if ($request->has('author_image')) {
				$author_image = $request->file('author_image');
				$folder_autor = '/img/news/autor/';
				$name_autor = Str::slug($author_image->hashName());
				$filePath_autor = $folder_autor . $name_autor . '.' . $author_image->getClientOriginalExtension();
				$this->uploadOne($author_image, $folder_autor, 'public', $name_autor);

				$this->news->title = $request->input('title');
				$this->news->author = $request->input('author');
				$this->news->author_image = $filePath_autor;
				$this->news->content = $request->input('content');
				$this->news->image = $filePath;
				$this->news->save();
			}
		}

		toastr()->success('Se creó correctamente');
		return back();
	}
}
