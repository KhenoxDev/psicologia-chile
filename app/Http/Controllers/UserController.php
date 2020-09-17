<?php

namespace App\Http\Controllers;

use App\Rol;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	public function __construct()
	{
		$this->user = new User();
		$this->roles = new Rol();
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
		$roles = $this->roles::all();
		return view('pages.admin.users', compact('users', 'roles'));
	}


	public function store(Request $request)
	{
		$this->user->rut = $request->input('rut');
		$this->user->name = $request->input('name');
		$this->user->last_name = $request->input('last_name');
		$this->user->password = $request->input('password');
		$this->user->rol_id = $request->input('rol_id');
		$this->user->is_active = $request->input('is_active');

		$this->user->save();

		return back();
	}

	public function edit($id)
	{
		$users = $this->user::find($id);
		$roles = $this->roles::where("id", "!=", $users->rol_id)->get();
		return view('pages.admin.users_edit', compact('users', 'roles'));
	}


	public function update(Request $request)
	{
		$current = $this->user::find($request->input('id'));

		$current->rut = $request->input('rut');
		$current->name = $request->input('name');
		$current->last_name = $request->input('last_name');
		$current->rol_id = $request->input('rol_id');

		$current->save();

		$users = $this->user::all();

		return view('pages.admin.users', compact('users'));
	}


	public function active($id)
	{
		$current = $this->user::find($id);

		$current->is_active = 1;

		$current->save();

		toastr()->success("El usuario se ha activado.");

		return back();
	}

	public function inactive($id)
	{
		$current = $this->user::find($id);

		$current->is_active = 0;

		$current->save();

		toastr()->success("El usuario se ha desactivado.");

		return back();
	}


	//Metodos cambio de contraseña
	public function update_password(Request $request)
	{
		if ($request->input('newPassword') != $request->input('repeatPassword')) {
			toastr()->error("Las contraseñas no son iguales, por favor volver a intentarlo.");

			return back();
		}

		$current = $this->user::find($request->input('id'));

		$current->password = Hash::make($request->input('newPassword'));

		$current->save();


		toastr()->success("Contraseña actualizada.");

		return back();
	}
}
