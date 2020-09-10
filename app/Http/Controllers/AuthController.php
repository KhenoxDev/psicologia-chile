<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Filesystem\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
	public function index()
	{
		return view('auth.login');
	}

	public function postLogin(Request $request)
	{
		request()->validate([
			'rut' => 'required',
			'password' => 'required',
		]);

		$credentials = $request->only('rut', 'password');
		if (Auth::attempt($credentials)) {
			return redirect()->route('admin.home');
		}

		toastr()->error('Credenciales invalidas. Por favor, intente nuevamente.');

		return back();
	}

	public function logout()
	{
		Session::flush();
		Auth::logout();
		toastr()->success('¡Te has desconectado correctamente!');

		return redirect()->route('admin.form.login');
	}
}
