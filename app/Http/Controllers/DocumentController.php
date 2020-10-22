<?php

namespace App\Http\Controllers;

use App\Document;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
	use UploadTrait;

	public function __construct()
	{
		$this->document = new Document();
	}

	public function index()
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$docs = $this->document::all();

		return view('pages.admin.document', compact('docs'));
	}

	public function store(Request $request)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$validator = Validator::make($request->all(), [
			'documento' => 'required|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx|max:5096'
		]);

		if ($validator->fails()) {
			toastr()->error('El documento es requerido y debe ser doc, docx, pdf, xls, xlsx, ppt o pptx');
			return back();
		}

		if ($request->has('documento')) {
			$file = $request->file('documento');
			$folder = '/docs/';
			$name = Str::slug($file->getClientOriginalName());
			$filePath = $folder . $name . '.' . $file->getClientOriginalExtension();
			$this->uploadOne($file, $folder, 'public', $name);

			$this->document->name = $name;
			$this->document->file = $filePath;
			$this->document->save();
		}

		toastr()->success('Archivo subido correctamente');
		return back();
	}

	public function destroy($id)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$delete = $this->document::find($id);
		if (File::exists(public_path($delete->file))) {
			File::delete(public_path($delete->file));
			$delete->delete();

			toastr()->success('Se eliminó el documento y el registro correctamente');
			return back();
		} else {
			$delete->delete();

			toastr()->warning('Se eliminó el registro correctamente pero el documento no pudo encontrarse');
			return back();
		}
	}

	public function download($id)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$doc = $this->document::find($id);

		if (File::exists(public_path($doc->file))) {
			toastr()->success('¡Archivo descargado!');
			return response()->download(public_path($doc->file));
		}

		toastr()->error("Hubo un error al descargar el archivo. Por favor, intente más tarde");
		return back();
	}
}
