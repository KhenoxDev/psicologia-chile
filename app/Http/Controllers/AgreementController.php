<?php

namespace App\Http\Controllers;

use App\Agreement;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\AgreementPsychologist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;

class AgreementController extends Controller
{
	use UploadTrait;

	public $agreement;
	public $agreement_psch;

	public function __construct()
	{
		$this->agreement = new Agreement();
		$this->agreement_psch = new AgreementPsychologist();
	}

	public function getAgreements()
	{
		$agreement = $this->agreement::all();

		return response()->json($agreement);
	}

	public function index()
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$agreements = $this->agreement::all();

		return view('pages.admin.agreements', compact('agreements'));
	}

	public function store(Request $request)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$validator = Validator::make($request->all(), [
			'titulo' => 'required',
			'descripcion' => 'required',
			'condicion' => 'required',
			'documento' => 'required|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx|max:5096',
			'imagen' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
		]);

		if ($validator->fails()) {
			toastr()->error('Problemas al cargar el formulario, por favor intentar nuevamente.');
			return back();
		}

		$this->agreement->title = $request->input('titulo');
		$this->agreement->description = $request->input('descripcion');
		$this->agreement->conditions = $request->input('condicion');

		if ($request->has('imagen')) {
			$image = $request->file('imagen');
			$folder = '/img/covenants/';
			$name = Str::slug($image->hashName());
			$filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
			$this->uploadOne($image, $folder, 'public', $name);


			$this->agreement->img = $filePath;

			if ($request->has('documento')) {
				$file = $request->file('documento');
				$folder = '/docs/';
				$name = Str::slug($file->getClientOriginalName());
				$filePath2 = $folder . $name . '.' . $file->getClientOriginalExtension();
				$this->uploadOne($file, $folder, 'public', $name);


				$this->agreement->doc = $filePath2;
			}
		}
		$this->agreement->save();

		toastr()->success('Se creó correctamente');
		return back();
	}

	public function destroy($id)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$delete = $this->agreement::find($id);

		if (!File::exists(public_path($delete->doc)) && !File::exists(public_path($delete->img))) {
			$this->agreement_psch::where('agreement_id', $id)->delete();
			$delete->delete();

			toastr()->warning('Se eliminó el registro correctamente pero el documento y la imagen no se encontraron');
			return back();
		}

		if (File::exists(public_path($delete->doc))) {
			File::delete(public_path($delete->doc));

			if (File::exists(public_path($delete->img))) {
				File::delete(public_path($delete->img));

				$this->agreement_psch::where('agreement_id', $id)->delete();
				$delete->delete();

				toastr()->success('Se eliminó la imagen, el documento y el registro correctamente');
				return back();
			} else {
				$this->agreement_psch::where('agreement_id', $id)->delete();
				$delete->delete();

				toastr()->warning('Se eliminó el documento y el registro correctamente pero la imagen no pudo encontrarse');
				return back();
			}
		} else {
			$this->agreement_psch::where('agreement_id', $id)->delete();
			$delete->delete();

			toastr()->warning('Se eliminó el registro y la imagen correctamente pero el documento no se pudo encontrar');
			return back();
		}
	}

	public function storePsch(Request $request)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$data = [];
		$psch = $request->input('psch');

		$this->agreement_psch::where('agreement_id', $request->input("agreement_id"))->delete();

		for ($i = 0; $i < count($psch); $i++) {
			array_push($data, ["agreement_id" => $request->input("agreement_id"), "psychologist_id" => $psch[$i]]);
		}

		if (count($data) == 0) {
			toastr()->info("Los psicólogos ya se encuentran enlazados.");
			return back();
		}

		$this->agreement_psch::insert($data);

		toastr()->success("Se enlazaron los psicólogos correctamente al convenio.");
		return back();
	}

	public function getAgreementPsch($agreement = null)
	{
		if (is_null($agreement)) {
			$psch = $this->agreement_psch::all();
		} else {
			$psch = $this->agreement_psch::where('agreement_id', $agreement)->get();
		}

		return response()->json($psch);
	}

	public function assignPsch($id)
	{
		//Obtener los psicologos de la api y armar un nuevo arreglo de objetos
		$client = new Client();
		$response = $client->request('GET', 'https://online.psicologiachile.cl/gateway-json.php?service=staff');
		$body = $response->getBody();
		$psicologos = json_decode($body->getContents());
		$newPsch = [];

		foreach ($psicologos->items as $item) {
			array_push($newPsch, ['index' => $item->index, 'nombreCompleto' => preg_replace('/[^a-z0-9]+$/i', ' ', $item->nombreCompleto), 'checked' => false]);
		}

		//Obtener los datos de los psicologos asociados
		$agreementPsch = $this->agreement_psch::where('agreement_id', $id)->get();

		foreach ($agreementPsch as $item) {
			for ($i = 0; $i < count($newPsch); $i++) {
				if ($item->psychologist_id == $newPsch[$i]['index']) {
					$newPsch[$i]['checked'] = true;
				}
			}
		}

		return view('pages.admin.agreements.psicologos', compact('newPsch', 'id'));
	}
}
