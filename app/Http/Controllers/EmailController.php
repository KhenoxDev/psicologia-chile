<?php

namespace App\Http\Controllers;

use App\Mail\VoluntaryMail;
use App\WorkUs;
use App\Voluntary;
use App\Mail\WorkUsMail;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
	use UploadTrait;
	protected $to;

	public function __construct()
	{
		$this->to = "desarrollo@psicologiachile.cl";
		$this->workus = new WorkUs();
		$this->voluntary = new Voluntary();
	}

	public function sendMailWorksWithUs(Request $request)
	{
		$exists = $this->workus::where('mail', $request->input('correo'))->exists();

		if ($exists) {
			toastr()->error('¡Ya existe el cv en nuestra base de datos!');
			return back();
		}

		$validator = Validator::make($request->all(), [
			'nombre' => 'required',
			'correo' => 'required|email',
			'telefono' => 'required|numeric|digits:9',
			'pais' => 'required|string',
			'cv' => 'required|mimes:pdf,doc,docx'
		], [
			'nombre.required' => 'El nombre es requerido.',
			'correo.required' => 'El correo es requerido.',
			'telefono.required' => 'El telefono es requerido.',
			'cv.required' => 'El CV es requerido.',
			'pais.required' => 'El país es requerido.',
			'correo.email' => 'El correo debe ser un email válido.',
			'telefono.digits' => 'El telefono debe contener 9 digitos.',
			'telefono.numeric' => 'El telefono debe contener sólo números.',
			'pais.string' => 'El país debe ser un texto, no se admiten números ni carácteres especiales.',
			'cv.mimes' => 'El CV debe ser extensión .pdf, .doc o .docx. No se admiten otros formatos.'
		]);

		if ($validator->fails()) {
			$errors = $validator->errors();

			foreach ($errors->all() as $message) {
				toastr()->error($message);
			}

			return back();
		}

		$this->workus->name = $request->input('nombre');
		$this->workus->mail = $request->input('correo');
		$this->workus->phone = $request->input('telefono');
		$this->workus->country = $request->input('pais');
		$this->workus->city = $request->input('ciudad');
		if ($request->has('cv')) {
			$file = $request->file('cv');
			$folder = '/docs/cv/';
			$name = Str::slug($request->input('nombre')) . '_' . time();
			$filePath = $folder . $name . '.' . $file->getClientOriginalExtension();
			$this->uploadOne($file, $folder, 'public', $name);

			$this->workus->cv = $filePath;
		}
		$this->workus->save();

		Mail::to($this->to)->send(new WorkUsMail($this->workus));

		toastr()->success('Se ha enviado un correo con tu cv. Espera nuestro llamado!');
		return back();
	}

	public function sendMailVoluntary(Request $request)
	{
		$exists = $this->voluntary::where('email', $request->input('correo'))->exists();

		if ($exists) {
			toastr()->error('¡Ya su postulación a un voluntariado!');
			return back();
		}

		$validator = Validator::make($request->all(), [
			'nombre' => 'required',
			'correo' => 'required|email',
			'telefono' => 'required|numeric|digits:9',
			'voluntario' => 'required',
			'mensaje' => 'required'
		], [
			'nombre.required' => 'El nombre es requerido.',
			'correo.required' => 'El correo es requerido.',
			'telefono.required' => 'El telefono es requerido.',
			'voluntario.required' => 'El voluntario es requerido.',
			'mensaje.required' => 'El mensaje es requerido.',
			'correo.email' => 'El correo debe ser un email válido.',
			'telefono.digits' => 'El telefono debe contener 9 digitos.',
			'telefono.numeric' => 'El telefono debe contener sólo números.',
		]);

		if ($validator->fails()) {
			$errors = $validator->errors();

			foreach ($errors->all() as $message) {
				toastr()->error($message);
			}

			return back();
		}

		$this->voluntary->name = $request->input('nombre');
		$this->voluntary->email = $request->input('correo');
		$this->voluntary->phone = $request->input('telefono');
		$this->voluntary->voluntary = $request->input('voluntario');
		$this->voluntary->message = $request->input('mensaje');
		$this->voluntary->save();

		Mail::to($this->to)->send(new VoluntaryMail($this->voluntary));

		toastr()->success('Se ha enviado tu postulación. Espera nuestro llamado!');
		return back();
	}
}
