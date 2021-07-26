<?php

namespace App\Solid\Reporting;

use App\Solid\Repositories\SalesRepository;
use Exception;
use Illuminate\Support\Facades\Auth;

class SalesReporter
{

	/**
	 * @var SalesRepository
	 */
	private $repo;

	public function __construct(SalesRepository $repo)
	{

		$this->repo = $repo;
	}

	/**
	 * @param                      $startDate
	 * @param                      $endDate
	 * @param SalesOutputInterface $formater
	 *
	 * @return mixed
	 */
	public function total($startDate, $endDate, SalesOutputInterface $formater)
	{

		// get sales from db
		$sales = $this->repo->total($startDate, $endDate);

		// return results
		return $formater->output($startDate, $endDate, $sales);
	}

	/**
	 * @param                      $startDate
	 * @param                      $endDate
	 * @param SalesOutputInterface $formater
	 *
	 * @return mixed
	 */
	public function average($startDate, $endDate, SalesOutputInterface $formater)
	{

		// get sales from db
		$sales = $this->repo->average($startDate, $endDate);

		// return results
		return $formater->output($startDate, $endDate, $sales);
	}

}
