<?php

namespace App\Http\Controllers;

use App\Generality;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class GeneralityController extends Controller
{
	use UploadTrait;

	public function __construct()
	{
		$this->generality = new Generality();
	}

	/* Main video */

	public function getMainVideo()
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$videos = $this->generality::where('module', 'main_video')->orderBy('is_active', 'desc')->get();
		return view('pages.admin.generalities.video', compact('videos'));
	}

	public function setMainVideo(Request $request)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$validator = Validator::make($request->all(), [
			'video' => ['required', 'regex:/^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?$/']
		]);

		if ($validator->fails()) {
			toastr()->error('El link es requerido y debe tener el siguiente formato: https://www.youtube.com/embed/doEZbygpkFc');
			return back();
		}

		$this->generality->module = "main_video";
		$this->generality->element = $request->input('video');
		$this->generality->save();

		toastr()->success('Se creó correctamente');
		return back();
	}

	public function setDefaultVideo($id)
	{

		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

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
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$this->generality::find($id)->delete();

		toastr()->success("Se eliminó correctamente");
		return back();
	}

	/* Main banner */

	public function getMainBanner()
	{
		if (!in_array(Auth::user()->rol_id, [1])) {
			return view("pages.error.403");
		}

		$banners = $this->generality::where('module', 'main_banner')->orderBy('is_active', 'desc')->get();
		return view('pages.admin.generalities.banner', compact('banners'));
	}

	public function setMainBanner(Request $request)
	{
		if (!in_array(Auth::user()->rol_id, [1])) {
			return view("pages.error.403");
		}

		$validator = Validator::make($request->all(), [
			'nombre' => 'required',
			'banner' => 'required|image|mimes:jpeg,png,jpg,svg|max:5096'
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

			$this->generality->module = 'main_banner';
			$this->generality->element = $filePath;
			$this->generality->save();
		}

		toastr()->success('Se creó correctamente');
		return back();
	}

	public function setDefaultBanner($id)
	{
		if (!in_array(Auth::user()->rol_id, [1])) {
			return view("pages.error.403");
		}

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
		if (!in_array(Auth::user()->rol_id, [1])) {
			return view("pages.error.403");
		}

		$delete = $this->generality::find($id);
		if (File::exists(public_path($delete->element))) {
			File::delete(public_path($delete->element));
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
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$popups = $this->generality::where('module', 'popup_info')->orderBy('is_active', 'desc')->get();
		return view('pages.admin.generalities.popup', compact('popups'));
	}

	public function setMainPopup(Request $request)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$validator = Validator::make($request->all(), [
			'nombre' => 'required',
			'popup' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
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

			$this->generality->module = 'popup_info';
			$this->generality->element = $filePath;
			$this->generality->url = $request->input('url');
			$this->generality->save();
		}

		toastr()->success('Se creó correctamente');
		return back();
	}

	public function setDefaultPopup($id)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

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
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$banner_selected = $this->generality::find($id);
		$banner_selected->is_active = 0;
		$banner_selected->save();

		toastr()->success("Se dio de baja correctamente");
		return back();
	}

	public function destroyMainPopup($id)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$delete = $this->generality::find($id);
		if (File::exists(public_path($delete->element))) {
			File::delete(public_path($delete->element));
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
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$business = $this->generality::whereIn('module', ['mision', 'vision', 'valores'])->get();
		return view('pages.admin.generalities.business', compact('business'));
	}

	public function setBusinessInfo(Request $request)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$business = $this->generality::all();

		foreach ($business as $bus) {
			if ($bus->module == $request->input('seccion')) {
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

		$this->generality->module = $request->input('seccion');
		$this->generality->element = $request->input('texto');
		$this->generality->is_active = 1;
		$this->generality->save();

		toastr()->success('Se creó correctamente');
		return back();
	}

	public function editBusinessInfo(Request $request)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		if ($request->ajax()) {
			$business = $this->generality::find($request->id);

			return response()->json($business);
		}

		toastr()->error('No tienes permisos para realizar esta acción.');
		return back();
	}

	public function updateBusinessInfo(Request $request)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$data = $this->generality::find($request->input('id'));

		$validator = Validator::make($request->all(), [
			'texto' => 'required'
		]);

		if ($validator->fails()) {
			toastr()->error('Hubo problemas en el formulario.');
			return back();
		}

		$data->element = $request->input('texto');
		$data->save();

		toastr()->success('Se actualizó correctamente');
		return back();
	}

	public function destroyBusinessInfo($id)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2])) {
			return view("pages.error.403");
		}

		$this->generality::find($id)->delete();

		toastr()->success('Se eliminó correctamente');
		return back();
	}

	/* Api */
	public function getVideoApi()
	{
		$video = $this->generality::where('module', 'main_video')->where('is_active', 1)->get();

		return response()->json($video);
	}

	public function getBannerApi()
	{
		$banner = $this->generality::where('module', 'main_banner')->where('is_active', 1)->get();

		return response()->json($banner);
	}

	public function getPopupApi()
	{
		$popup = $this->generality::where('module', 'popup_info')->where('is_active', 1)->get();

		return response()->json($popup);
	}

	public function getBusinessApi()
	{
		$business = $this->generality::whereIn('module', ['mision', 'vision', 'valores'])->where('is_active', 1)->get();

		return response()->json($business);
	}
}
