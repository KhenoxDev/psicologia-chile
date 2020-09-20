<?php

namespace App\Http\Controllers;

use App\Generality;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class GeneralityController extends Controller
{
	use UploadTrait;

	public function __construct()
	{
		$this->generality = new Generality();
	}

	public function getGeneralities()
	{
		$generality = $this->generality::all();

		return response()->json($generality);
	}

	/* Main video */

	public function getMainVideo()
	{
		$videos = $this->generality::where('module', 'main_video')->orderBy('is_active', 'desc')->get();
		return view('pages.admin.generalities.video', compact('videos'));
	}

	public function setMainVideo(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'video' => ['required', 'regex:/^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?$/']
		]);

		if ($validator->fails()) {
			toastr()->error('El link es requerido y debe tener el siguiente formato: https://www.youtube.com/embed/doEZbygpkFc');
			return back();
		}

		$array = [
			'link' => $request->input('video')
		];

		$this->generality->module = "main_video";
		$this->generality->json = json_encode($array);
		$this->generality->save();

		toastr()->success('Se creó correctamente');
		return back();
	}

	public function setDefaultVideo($id)
	{
		$videos = $this->generality::where(['module' => 'main_video', 'is_active' => 1])->get();
		if (count($videos) > 0) {
			foreach ($videos as $video) {
				$video->is_active = 0;
				$video->save();
			}
		}

		$video_selected = $this->generality::find($id);
		$video_selected->is_active = 1;
		$video_selected->save();

		toastr()->success("Se dejó por defecto correctamente");
		return back();
	}

	public function destroyMainVideo($id)
	{
		$this->generality::find($id)->delete();

		toastr()->success("Se eliminó correctamente");
		return back();
	}

	/* Main banner */

	public function getMainBanner()
	{
		$banners = $this->generality::where('module', 'main_banner')->orderBy('is_active', 'desc')->get();
		return view('pages.admin.generalities.banner', compact('banners'));
	}

	public function setMainBanner(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'nombre' => 'required',
			'banner' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
		]);

		if ($validator->fails()) {
			toastr()->error('Hubo problemas en el formulario. Por favor, recuerde que la imagen debe ser extensión png, jpg, jpeg o svg');
			return back();
		}

		if ($request->has('banner')) {
			$image = $request->file('banner');
			$folder = '/img/banner/';
			$name = Str::slug($request->input('nombre'));
			$filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
			$this->uploadOne($image, $folder, 'public', $name);

			$array = [
				'link' => $filePath
			];

			$this->generality->module = 'main_banner';
			$this->generality->json = json_encode($array);
			$this->generality->save();
		}

		toastr()->success('Se creó correctamente');
		return back();
	}

	public function setDefaultBanner($id)
	{
		$banners = $this->generality::where(['module' => 'main_banner', 'is_active' => 1])->get();
		if (count($banners) > 0) {
			foreach ($banners as $banner) {
				$banner->is_active = 0;
				$banner->save();
			}
		}

		$banner_selected = $this->generality::find($id);
		$banner_selected->is_active = 1;
		$banner_selected->save();

		toastr()->success("Se dejó por defecto correctamente");
		return back();
	}

	public function destroyMainBanner($id)
	{
		$delete = $this->generality::find($id);
		if (File::exists(public_path(json_decode($delete->json)->link))) {
			File::delete(public_path(json_decode($delete->json)->link));
			$delete->delete();

			toastr()->success('Se eliminó la imagen y el registro correctamente');
			return back();
		} else {
			$delete->delete();

			toastr()->warning('Se eliminó el registro correctamente pero la imagen no pudo encontrarse');
			return back();
		}
	}

	/* Pop up */

	public function getMainPopup()
	{
		$popups = $this->generality::where('module', 'popup_info')->orderBy('is_active', 'desc')->get();
		return view('pages.admin.generalities.popup', compact('popups'));
	}

	public function setMainPopup(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'nombre' => 'required',
			'popup' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
		]);

		if ($validator->fails()) {
			toastr()->error('Hubo problemas en el formulario. Por favor, recuerde que la imagen debe ser extensión png, jpg, jpeg o svg');
			return back();
		}

		if ($request->has('popup')) {
			$image = $request->file('popup');
			$folder = '/img/popup/';
			$name = Str::slug($request->input('nombre'));
			$filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
			$this->uploadOne($image, $folder, 'public', $name);

			$array = [
				'link' => $filePath
			];

			$this->generality->module = 'popup_info';
			$this->generality->json = json_encode($array);
			$this->generality->save();
		}

		toastr()->success('Se creó correctamente');
		return back();
	}

	public function setDefaultPopup($id)
	{
		$banners = $this->generality::where(['module' => 'popup_info', 'is_active' => 1])->get();
		if (count($banners) > 0) {
			foreach ($banners as $banner) {
				$banner->is_active = 0;
				$banner->save();
			}
		}

		$banner_selected = $this->generality::find($id);
		$banner_selected->is_active = 1;
		$banner_selected->save();

		toastr()->success("Se dejó por defecto correctamente");
		return back();
	}

	public function unsetDefaultPopup($id)
	{
		$banner_selected = $this->generality::find($id);
		$banner_selected->is_active = 0;
		$banner_selected->save();

		toastr()->success("Se dio de baja correctamente");
		return back();
	}

	public function destroyMainPopup($id)
	{
		$delete = $this->generality::find($id);
		if (File::exists(public_path(json_decode($delete->json)->link))) {
			File::delete(public_path(json_decode($delete->json)->link));
			$delete->delete();

			toastr()->success('Se eliminó la imagen y el registro correctamente');
			return back();
		} else {
			$delete->delete();

			toastr()->warning('Se eliminó el registro correctamente pero la imagen no pudo encontrarse');
			return back();
		}
	}

	/* Own Business */

	public function getBusinessInfo()
	{
		$business = $this->generality::where('module', 'business_info')->get();
		return view('pages.admin.generalities.business', compact('business'));
	}

	public function setBusinessInfo(Request $request)
	{
		$business = $this->generality::where('module', 'business_info')->get();

		foreach ($business as $bus) {
			if (json_decode($bus->json)->section == $request->input('seccion')) {
				toastr()->error('Ya existe un registro: ' . $request->input('seccion'));
				return back();
			}
		}

		$validator = Validator::make($request->all(), [
			'seccion' => 'required',
			'texto' => 'required'
		]);

		if ($validator->fails()) {
			toastr()->error('Hubo problemas en el formulario.');
			return back();
		}

		$array = [
			'section' => $request->input('seccion'),
			'text' => $request->input('texto')
		];

		$this->generality->module = "business_info";
		$this->generality->json = json_encode($array);
		$this->generality->is_active = 1;
		$this->generality->save();

		toastr()->success('Se creó correctamente');
		return back();
	}

	public function editBusinessInfo(Request $request)
	{
		if ($request->ajax()) {
			$business = $this->generality::find($request->id);

			return response()->json($business);
		}

		toastr()->error('No tienes permisos para realizar esta acción.');
		return back();
	}

	public function updateBusinessInfo(Request $request)
	{
		$data = $this->generality::find($request->input('id'));

		$validator = Validator::make($request->all(), [
			'texto' => 'required'
		]);

		if ($validator->fails()) {
			toastr()->error('Hubo problemas en el formulario.');
			return back();
		}

		$section = json_decode($data->json)->section;
		$newjson = [
			'section' => $section,
			'text' => $request->input('texto'),
		];

		$data->json = json_encode($newjson);
		$data->save();

		toastr()->success('Se actualizó correctamente');
		return back();
	}

	public function destroyBusinessInfo($id)
	{
		$this->generality::find($id)->delete();

		toastr()->success('Se eliminó correctamente');
		return back();
	}
}
