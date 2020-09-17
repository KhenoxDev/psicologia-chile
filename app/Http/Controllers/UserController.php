<?php

namespace App\Http\Controllers;

use App\Rol;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

	public function edit(Request $request)
	{
		if ($request->ajax()) {
			$users = $this->user::find($request->id);

			$roles = $this->roles::all();

			return response()->json([$users, $roles]);
		}

		toastr()->error('No tienes permisos para realizar esta acción.');
		return back();
	}


	public function update(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'rut_edit' => 'required',
			'name_edit' => 'required',
			'last_name_edit' => 'required',
			'rol_id_edit' => 'required',
		]);

		if ($validator->fails()) {
			toastr()->error('Hay problemas con el formulario. Por favor, complete todos los campos e intente nuevamente.');
			return back();
		}

		$user = $this->user::find($request->input('id_edit'));

		$user->rut = $request->input('rut_edit');
		$user->name = $request->input('name_edit');
		$user->last_name = $request->input('last_name_edit');
		$user->rol_id = $request->input('rol_id_edit');

		$user->save();

		toastr()->success('Se actualizó correctamente.');
		return back();
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
