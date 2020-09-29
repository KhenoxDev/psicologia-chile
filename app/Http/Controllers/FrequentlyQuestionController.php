<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FrequentlyQuestion;

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
		$questions = $this->question::all();

		return view('pages.admin.questions', compact('questions'));
	}


	public function store(Request $request)
	{
		$this->question->title = $request->input('pregunta');
		$this->question->answer = $request->input('respuesta');

		$this->question->save();

		toastr()->success('Se creó correctamente');
		return back();
	}

	public function edit(Request $request)
	{
		if ($request->ajax()) {
			$questions = $this->question::find($request->id);

			return response()->json($questions);
		}

		toastr()->error('No tienes permisos para realizar esta acción.');
		return back();
	}


	public function update(Request $request)
	{
		$current = $this->question::find($request->input('id'));

		$current->title = $request->input('pregunta');
		$current->answer = $request->input('respuesta');

		$current->save();

		$questions = $this->question::all();

		return view('pages.admin.questions', compact('questions'));
	}


	public function delete($id)
	{
		$erase = $this->question::find($id);
		$erase->delete();

		return back();
	}
}
