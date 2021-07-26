<?php

namespace App\Http\Controllers;

use App\Solid\Reporting\HtmlOuput;
use App\Solid\Reporting\JsonOuput;
use App\Solid\Reporting\SalesReporter;
use App\Solid\Repositories\SalesRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{

	/**
	 * @var HtmlOuput
	 */
	private $outputFormat;

	public function __construct(Request $request)
	{

		parent::__construct();

		// perform authentication
		// Middleware | web or api
		// if (!Auth::check()) {
		// 	throw new Exception('Authentication required for reporting');
		// }
		$format = $request->get('format');
		$this->setOuputFormat($format);

	}

	/**
	 * @param $startDate
	 * @param $endDated
	 *
	 * @throws Exception
	 */
	public function total($startDate, $endDated)
	{

		// get total sales
		return (new SalesReporter(new SalesRepository()))->total($startDate, $endDated, $this->outputFormat);

	}

	/**
	 * @param $startDate
	 * @param $endDated
	 *
	 * @throws Exception
	 */
	public function average($startDate, $endDated)
	{

		// get total sales
		return (new SalesReporter(new SalesRepository()))->average($startDate, $endDated, $this->outputFormat);

	}

	private function setOuputFormat($format)
	{

		$this->outputFormat = new HtmlOuput();
		if (!empty($format) && in_array($format, ['html', 'json'])) {

			if ($format === 'json') {
				$this->outputFormat = new JsonOuput();
			}

		}
	}

}
