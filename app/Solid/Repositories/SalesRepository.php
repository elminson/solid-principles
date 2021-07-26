<?php

namespace App\Solid\Repositories;

use Illuminate\Support\Facades\DB;

class SalesRepository
{

	/**
	 * @param $startDate
	 * @param $endDate
	 */
	public function total($startDate, $endDate)
	{

		return DB::table('sales')->whereBetween('created_at', [$startDate, $endDate])->sum('charge') / 100;

	}


	/**
	 * @param $startDate
	 * @param $endDate
	 */
	public function average($startDate, $endDate)
	{

		return DB::table('sales')->whereBetween('created_at', [$startDate, $endDate])->average('charge') / 100;

	}

}


