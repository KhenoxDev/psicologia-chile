<?php

namespace App\Http\Controllers;

use App\Author;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AuthorController extends Controller
{
	use UploadTrait;

	public function __construct()
	{
		$this->author = new Author();
	}

	public function getAuthorsJson($id)
	{
		$authors = $this->author::find($id);

		return response()->json($authors);
	}

	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'author' => 'required',
			'author_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
		]);

		if ($validator->fails()) {
			toastr()->error('Problemas al cargar el formulario, por favor intentar nuevamente.');
			return back();
		}


		if ($request->has('author_image')) {
			$author_image = $request->file('author_image');
			$folder_autor = '/img/news/autor/';
			$name_autor = Str::slug($author_image->hashName());
			$filePath_autor = $folder_autor . $name_autor . '.' . $author_image->getClientOriginalExtension();
			$this->uploadOne($author_image, $folder_autor, 'public', $name_autor);

			$this->author->name = $request->input('author');
			$this->author->image = $filePath_autor;
			$this->author->save();
		}


		toastr()->success('Se creó correctamente');
		return back();
	}

	public function getAuthors()
	{
		$authors = $this->author::all();

		return view('pages.admin.news.up', compact('authors'));
	}
}
