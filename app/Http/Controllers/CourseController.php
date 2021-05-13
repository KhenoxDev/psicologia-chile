<?php

namespace App\Http\Controllers;

use App\Course;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
	use UploadTrait;

	public function __construct()
	{
		$this->course = new Course();
	}

	public function getCourses()
	{
		$courses = $this->course::all();

		return response()->json($courses);
	}

	public function getCourse($id)
	{
		$course = $this->course::find($id);

		return response()->json($course);
	}

	public function index()
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$courses = $this->course::all();

		return view('pages.admin.courses', compact('courses'));
	}

	public function store(Request $request)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$validator = Validator::make($request->all(), [
			'nombre' => 'required',
			'descripcion' => 'required',
			'documento' => 'required|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx|max:5096',
			'imagen' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
		]);

		if ($validator->fails()) {
			toastr()->error('Problemas al cargar el formulario, por favor intentar nuevamente.');
			return back();
		}

		$this->course->name = $request->input('nombre');
		$this->course->slug = strtolower(Str::slug($request->input('nombre'), '-'));
		$this->course->description = $request->input('descripcion');

		if ($request->has('imagen')) {
			$image = $request->file('imagen');
			$folder = '/img/courses/';
			$name = strtolower(Str::slug($image->hashName(), '-'));
			$filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
			$this->uploadOne($image, $folder, 'public', $name);
			$this->course->image = $filePath;
		}

		if ($request->has('documento')) {
			$file = $request->file('documento');
			$folder = '/docs/courses/';
			$name = strtolower(Str::slug($file->hashName(), '-'));
			$filePath2 = $folder . $name . '.' . $file->getClientOriginalExtension();
			$this->uploadOne($file, $folder, 'public', $name);
			$this->course->doc = $filePath2;
		}

		$this->course->save();

		toastr()->success('Se creó correctamente');
		return back();
	}

	public function edit($id)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$course = $this->course::find($id);

		return view('pages.admin.courses.edit', compact('course'));
	}

	public function update(Request $request)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$validator = Validator::make($request->all(), [
			'nombre' => 'required',
			'descripcion' => 'required',
			'documento' => 'mimes:doc,docx,pdf,xls,xlsx,ppt,pptx|max:5096',
			'imagen' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
		]);

		if ($validator->fails()) {
			toastr()->error('Problemas al cargar el formulario, por favor intentar nuevamente.');
			return back();
		}
		$course = $this->course::find($request->input('id'));
		$course->name = $request->input('nombre');
		$course->slug = strtolower(Str::slug($request->input('nombre'), '-'));
		$course->description = $request->input('descripcion');

		if ($request->has('imagen')) {
			if (File::exists(public_path($course->image))) {
				File::delete(public_path($course->image));
			}

			$image = $request->file('imagen');
			$folder = '/img/courses/';
			$name = strtolower(Str::slug($image->hashName(), '-'));
			$filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
			$this->uploadOne($image, $folder, 'public', $name);
			$course->image = $filePath;
		}

		if ($request->has('documento')) {
			if (File::exists(public_path($course->doc))) {
				File::delete(public_path($course->doc));
			}

			$file = $request->file('documento');
			$folder = '/docs/courses/';
			$name = strtolower(Str::slug($file->hashName(), '-'));
			$filePath2 = $folder . $name . '.' . $file->getClientOriginalExtension();
			$this->uploadOne($file, $folder, 'public', $name);
			$course->doc = $filePath2;
		}

		$course->save();

		toastr()->success('Se modificó correctamente');
		return back();
	}

	public function inactive($id)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$course = $this->course::find($id);
		$course->is_active = 0;

		toastr()->warning('Se desactivó el curso ' . $course->name);

		$course->save();

		return back();
	}

	public function active($id)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$course = $this->course::find($id);
		$course->is_active = 1;

		toastr()->warning('Se activó el curso ' . $course->name);

		$course->save();

		return back();
	}
}
