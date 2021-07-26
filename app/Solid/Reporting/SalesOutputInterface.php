<?php namespace App\Solid\Reporting;

interface SalesOutputInterface {
	public function output($startDate, $endDate, $sales);
}