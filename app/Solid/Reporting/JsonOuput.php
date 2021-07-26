<?php namespace App\Solid\Reporting;

class JsonOuput implements SalesOutputInterface
{

	public function output($startDate, $endDate, $sales)
	{

		return json_encode(
			[
				'start_date' => $startDate,
				'end_date' => $endDate,
				'sales' => $sales,
			]
		);
	}
}