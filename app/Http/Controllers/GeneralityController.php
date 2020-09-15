<?php

namespace App\Http\Controllers;

use App\Generality;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GeneralityController extends Controller
{
	use UploadTrait;

	public function __construct()
	{
		$this->generality = new Generality();
	}

	public function uploadLogo(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'logo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
		]);

		if ($validator->fails()) {
			toastr()->error('El logo es requerido y debe ser jpeg, png, jpg o svg');
			return back();
		}

		if ($request->has('logo')) {
			$image = $request->file('logo');
			$folder = '/img/navbar';
			$name = Str::slug($image->hashName()) . '_' . time();
			$filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
			$this->uploadOne($image, $folder, 'public', $name);
		}

		toastr()->success('Imagen subida correctamente');
		return back();
	}
}
