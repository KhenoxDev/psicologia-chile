<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	public function __construct()
	{
		$this->user = new User();
	}

	public function getUsers($order = null)
	{
		if (!is_null($order)) {
			$row = $this->user::orderBy('name', $order)->paginate();
		} else {
			$row = $this->user::paginate();
		}

		return response()->json($row);
	}

	public function index()
	{
		$users = $this->user::all();

		return view('pages.admin.users', compact('users'));
	}


	public function store(Request $request)
	{
		$this->user->rut = $request->input('rut');
		$this->user->name = $request->input('name');
		$this->user->last_name = $request->input('last_name');
		$this->user->password = $request->input('password');
		$this->user->id_rol = $request->input('id_rol');

		$this->user->save();

		return back();
	}

	public function edit($id)
	{
		$users = $this->user::find($id);
		return view('pages.admin.users_edit', compact('users'));
	}

	/*
	public function update(Request $request)
	{
		$current = $this->question::find($request->input('id'));

		$current->title = $request->input('pregunta');
		$current->answer = $request->input('respuesta');

		$current->save();

		$questions = $this->question::all();

		return view('pages.admin.questions', compact('questions'));
	}


	public function delete($id)
	{
		$erase = $this->question::find($id);
		$erase->delete();

		return back();
	} */
}
