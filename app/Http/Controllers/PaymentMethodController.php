<?php

namespace App\Http\Controllers;

use App\PaymentMethod;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PaymentMethodController extends Controller
{
	use UploadTrait;

	public function __construct()
	{
		$this->pay = new PaymentMethod();
	}

	public function getPayments()
	{
		$payment = $this->pay::all();

		return response()->json($payment);
	}

	public function index()
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$payments = $this->pay::all();

		return view('pages.admin.generalities.pay', compact('payments'));
	}

	public function store(Request $request)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$validator = Validator::make($request->all(), [
			'nombre' => 'required',
			'metodo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
		]);

		if ($validator->fails()) {
			toastr()->error('Hubo problemas en el formulario. Por favor, recuerde que la imagen debe ser extensión png, jpg, jpeg o svg');
			return back();
		}

		if ($request->has('metodo')) {
			$image = $request->file('metodo');
			$folder = '/img/footer/';
			$name = Str::slug($request->input('nombre'));
			$filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
			$this->uploadOne($image, $folder, 'public', $name);

			$this->pay->name = $name;
			$this->pay->image = $filePath;
			$this->pay->save();
		}

		toastr()->success('Se creó correctamente');
		return back();
	}

	public function destroy($id)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$delete = $this->pay::find($id);
		if (File::exists(public_path($delete->image))) {
			File::delete(public_path($delete->image));
			$delete->delete();

			toastr()->success('Se eliminó la imagen y el registro correctamente');
			return back();
		} else {
			$delete->delete();

			toastr()->warning('Se eliminó el registro correctamente pero la imagen no pudo encontrarse');
			return back();
		}
	}
}
