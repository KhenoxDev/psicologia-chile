<?php

namespace App\Http\Controllers;

use App\Agreement;
use Illuminate\Http\Request;

class AgreementController extends Controller
{
	public function __construct()
	{
		$this->agreement = new Agreement();
	}

	public function getAgreements()
	{
		$agreement = $this->agreement::all();

		return response()->json($agreement);
	}
}
