<?php

namespace App\Http\Controllers;

use App\Solid\Reporting\SalesReporter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{

	public function __construct()
	{

		parent::__construct();
	}

	/**
	 * @param $startDate
	 * @param $endDated
	 *
	 * @throws Exception
	 */
	public function between($startDate, $endDated)
	{

		// get sales from db
		return (new SalesReporter())->between($startDate, $endDated);

	}

}
