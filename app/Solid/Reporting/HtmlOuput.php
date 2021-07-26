<?php namespace App\Solid\Reporting;

class HtmlOuput implements SalesOutputInterface
{

	public function output($startDate, $endDate, $sales)
	{

		return "Start Date: $startDate<br>
				End Date: $endDate</br><h1>Sales : $sales</h1>";
	}
}