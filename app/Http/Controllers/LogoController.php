<?php

namespace App\Http\Controllers;

use App\Logo;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class LogoController extends Controller
{
	use UploadTrait;

	public function __construct()
	{
		$this->logo = new Logo();
	}

	public function getLogos()
	{
		$logos = $this->logo::where('is_active', 1)->get();

		return response()->json($logos);
	}

	public function index()
	{
		if (!in_array(Auth::user()->rol_id, [1])) {
			return view("pages.error.403");
		}

		$logos = $this->logo::all();

		return view('pages.admin.generalities.logo', compact('logos'));
	}

	public function uploadLogo(Request $request)
	{
		if (!in_array(Auth::user()->rol_id, [1])) {
			return view("pages.error.403");
		}

		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'logo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
		]);

		if ($validator->fails()) {
			toastr()->error('El logo es requerido y debe ser jpeg, png, jpg o svg');
			return back();
		}

		if ($request->has('logo')) {
			$image = $request->file('logo');
			$folder = '/img/navbar/';
			$name = Str::slug($request->input('name')) . '_' . time();
			$filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
			$this->uploadOne($image, $folder, 'public', $name);

			$this->logo->name = $name;
			$this->logo->file_path = $filePath;
			$this->logo->save();
		}

		toastr()->success('Imagen subida correctamente');
		return back();
	}

	public function activeLogo($id)
	{
		if (!in_array(Auth::user()->rol_id, [1])) {
			return view("pages.error.403");
		}

		$all = $this->logo::where('is_active', 1)->get();
		foreach ($all as $one) {
			$one->is_active = 0;
			$one->save();
		}

		$logo = $this->logo::find($id);
		$logo->is_active = 1;
		$logo->save();

		toastr()->success('El logo ' . $logo->name . ' se ha dejado por defecto');
		return back();
	}

	public function inactiveLogo($id)
	{
		if (!in_array(Auth::user()->rol_id, [1])) {
			return view("pages.error.403");
		}

		$logo = $this->logo::find($id);
		$logo->is_active = 0;
		$logo->save();

		toastr()->success('El logo ' . $logo->name . ' se ha dado de baja');
		return back();
	}

	public function deleteLogo($id)
	{
		if (!in_array(Auth::user()->rol_id, [1])) {
			return view("pages.error.403");
		}

		$delete = $this->logo::find($id);
		if (File::exists(public_path($delete->file_path))) {
			File::delete(public_path($delete->file_path));
			$delete->delete();

			toastr()->success('Se eliminó la imagen y el registro correctamente');
			return back();
		} else {
			$delete->delete();

			toastr()->warning('Se eliminó el registro correctamente pero la imagen no pudo encontrarse');
			return back();
		}
	}
}
