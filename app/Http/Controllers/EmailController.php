<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\NewsletterMail;
use App\WorkUs;
use App\Voluntary;
use App\Newsletter;
use App\Mail\WorkUsMail;
use App\Mail\VoluntaryMail;
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
		$this->newsletter = new Newsletter();
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

	public function sendMailNewsletter(Request $request)
	{
		$exists = $this->newsletter::where('email', $request->input('correo'))->exists();

		if ($exists) {
			toastr()->error('¡Ya te encuentras suscrito!');
			return back();
		}

		$validator = Validator::make($request->all(), [
			'correo' => 'required|email',
		], [
			'correo.required' => 'El correo es requerido.',
			'correo.email' => 'El correo debe ser un email válido.',
		]);

		if ($validator->fails()) {
			$errors = $validator->errors();

			foreach ($errors->all() as $message) {
				toastr()->error($message);
			}

			return back();
		}

		$this->newsletter->name = $request->has('nombre') ? $request->input('nombre') : null;
		$this->newsletter->email = $request->input('correo');
		$this->newsletter->save();

		Mail::to($request->input('correo'))->send(new NewsletterMail($this->newsletter));

		toastr()->success('¡Te has suscrito!');
		return back();
	}

	public function inactiveNewsletter($id)
	{
		$row = $this->newsletter::find($id);
		$row->is_active = 0;
		$row->save();

		toastr()->success('Se anuló tu suscripción.. Vuelve por favor!');
		return redirect()->route('home');
	}


	public function sendMailContact(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'email' => 'required|email',
			'telefono'	=> 'required',
			'tipo'	=> 'required',
			'mensaje'	=> 'required',

		], [
			'name.required'	=> 'El nombre es requerido.',
			'email.required' => 'El correo es requerido.',
			'email.email' => 'El correo debe ser un email válido.',
			'telefono.required'	=> 'El telefono es requerido.',
			'tipo.required'	=> 'El tipo es requerido.',
			'mensaje.required'	=> 'El mensaje es requerido.',
		]);

		if ($validator->fails()) {
			$errors = $validator->errors();

			foreach ($errors->all() as $message) {
				toastr()->error($message);
			}

			return back();
		}

		$array = [];
		array_push($array, $request->all());


		Mail::to($this->to)->send(new ContactMail($array));

		toastr()->success('Contacto enviado');
		return back();
	}

}
