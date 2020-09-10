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
}
