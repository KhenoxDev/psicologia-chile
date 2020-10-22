<?php

namespace App\Http\Controllers;

use App\FrequentlyQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrequentlyQuestionController extends Controller
{
	public function __construct()
	{
		$this->question = new FrequentlyQuestion();
	}

	public function getQuestions($order = null)
	{
		if (!is_null($order)) {
			$row = $this->question::orderBy('created_at', $order)->paginate();
		} else {
			$row = $this->question::paginate();
		}

		return response()->json($row);
	}

	public function index()
	{
		if (!in_array(Auth::user()->rol_id, [1, 2, 3])) {
			return view("pages.error.403");
		}

		$questions = $this->question::all();

		return view('pages.admin.questions', compact('questions'));
	}


	public function store(Request $request)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2, 3])) {
			return view("pages.error.403");
		}

		$this->question->title = $request->input('pregunta');
		$this->question->answer = $request->input('respuesta');

		$this->question->save();

		return back();
	}

	public function edit(Request $request)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2, 3])) {
			return view("pages.error.403");
		}

		if ($request->ajax()) {
			$questions = $this->question::find($request->id);

			return response()->json($questions);
		}

		toastr()->error('No tienes permisos para realizar esta acción.');
		return back();
	}


	public function update(Request $request)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2, 3])) {
			return view("pages.error.403");
		}

		$current = $this->question::find($request->input('id'));

		$current->title = $request->input('pregunta');
		$current->answer = $request->input('respuesta');

		$current->save();

		$questions = $this->question::all();

		return view('pages.admin.questions', compact('questions'));
	}


	public function delete($id)
	{
		if (!in_array(Auth::user()->rol_id, [1, 2, 3])) {
			return view("pages.error.403");
		}

		$erase = $this->question::find($id);
		$erase->delete();

		return back();
	}
}
