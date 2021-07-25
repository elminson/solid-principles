<?php

namespace Database\Factories;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{

	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Sale::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{

		return [
			'description' => $this->faker->name(),
			'charge' => rand(100, 1000),
			'created_at' => "2021-07-20"
		];
	}

}
