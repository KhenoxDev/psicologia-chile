<?php

namespace App\Http\Controllers;

use App\Social;
use App\SocialType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SocialController extends Controller
{
	public function __construct()
	{
		$this->social = new Social();
		$this->social_type = new SocialType();
	}

	public function getSocials()
	{
		$socials = $this->social::all();

		return response()->json($socials);
	}

	public function index()
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$socials = $this->social::all();
		$types = $this->social_type::orderBy('name', 'asc')->get();

		return view('pages.admin.generalities.social', compact('socials', 'types'));
	}

	public function store(Request $request)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$validator = Validator::make($request->all(), [
			'social' => 'required|url',
			'tipo' => 'required'
		]);

		if ($validator->fails()) {
			toastr()->error('Hay problemas con el formulario. Por favor, complete todos los campos e intente nuevamente.');
			return back();
		}

		$exists = $this->social::where('type_id', $request->input('tipo'))->get();

		if (count($exists) > 0) {
			toastr()->error('Ya existe un registro de la red social: ' . $exists[0]->type->name);
			return back();
		}

		$this->social->link = $request->input('social');
		$this->social->type_id = $request->input('tipo');
		$this->social->save();

		toastr()->success('Se almacenó correctamente.');
		return back();
	}

	public function edit(Request $request)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		if ($request->ajax()) {
			$social = $this->social::find($request->id);

			return response()->json($social);
		}

		toastr()->error('No tienes permisos para realizar esta acción.');
		return back();
	}

	public function update(Request $request)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$validator = Validator::make($request->all(), [
			'social' => 'required|url',
		]);

		if ($validator->fails()) {
			toastr()->error('Hay problemas con el formulario. Por favor, complete todos los campos e intente nuevamente.');
			return back();
		}

		$social = $this->social::find($request->input('id'));

		$social->link = $request->input('social');
		$social->save();

		toastr()->success('Se actualizó correctamente.');
		return back();
	}

	public function destroy($id)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$this->social::find($id)->delete();

		toastr()->success('Se eliminó correctamente.');
		return back();
	}
}
