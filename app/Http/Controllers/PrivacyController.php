<?php

namespace App\Http\Controllers;

use App\Privacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PrivacyController extends Controller
{
	public function __construct()
	{
		$this->privacy = new Privacy();
	}


	public function index()
	{
		$privacies = $this->privacy::all();
		return view('pages.admin.privacy', compact('privacies'));
	}


	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'content' => 'required|string'
		]);

		if ($validator->fails()) {
			toastr()->error('Hay errores en tu formulario. Por favor, corrigelos.');
			return back();
		}

		$this->privacy->content = $request->input('content');
		$this->privacy->save();

		toastr()->success('Se creó correctamente');
		return back();
	}

	public function update(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'content' => 'required|string'
		]);

		if ($validator->fails()) {
			toastr()->error('Hay problemas con el formulario. Por favor intente nuevamente.');
			return back();
		}

		$privacy = $this->privacy::find($request->input('id_edit'));
		$privacy->content = $request->input('contentEdit');
		$privacy->save();

		toastr()->success('Se actualizó correctamente.');
		return back();
	}
}
