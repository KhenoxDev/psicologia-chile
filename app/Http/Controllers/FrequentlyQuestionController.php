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

		return back();
	}

	public function edit($id)
	{
		$questions = $this->question::find($id);
		return view('pages.admin.questions_edit', compact('questions'));
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
