<?php

namespace App\Http\Controllers;

use App\Generality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GeneralityController extends Controller
{
	public function __construct()
	{
		$this->generality = new Generality();
	}

	public function setLogo(Request $request)
	{
		dd($request->file('logo'));
		if ($request->hasFile('logo')) {
			if ($request->file('logo')->isValid()) {
				$validated = $request->validate([
					'name' => 'string|max:40',
					'image' => 'mimes:jpeg,png,jpg,svg|max:1014',
				]);
				$extension = $request->image->extension();
				$request->image->storeAs('/public/img/navbar', $validated['name'] . "." . $extension);
				$url = Storage::url($validated['name'] . "." . $extension);

				// $file = File::create([
				// 	'name' => $validated['name'],
				// 	'url' => $url,
				// ]);
				// Session::flash('success', "Success!");
				return back();
			}
		}
		abort(500, 'Could not upload image :(');
	}
}
