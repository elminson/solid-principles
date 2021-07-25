<?php

namespace App\Solid\Reporting;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalesReporter
{

	/**
	 * @param $startDate
	 * @param $endDated
	 *
	 * @throws Exception
	 */
	public function between($startDate, $endDated)
	{

		// perform authentication
		// if (!Auth::check()) {
		// 	throw new Exception('Authentication required for reporting');
		// }

		// get sales from db
		$sales = $this->queryDBforSalesBetween($startDate, $endDated);

		// return results
		return $this->format($sales);
	}

	/**
	 * @param $startDate
	 * @param $endDate
	 */
	private function queryDBforSalesBetween($startDate, $endDate)
	{

		return DB::table('sales')->whereBetween('created_at', [$startDate, $endDate])->sum('charge') / 100;

	}

	/**
	 * @param float $sales
	 *
	 * @return string
	 */
	private function format(float $sales)
	{

		return "<h1>Sales : $sales</h1>";
	}

}
