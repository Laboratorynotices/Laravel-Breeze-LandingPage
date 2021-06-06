<?php

namespace Database\Factories;

use App\Models\PortfolioFilter;
use Illuminate\Database\Eloquent\Factories\Factory;

class PortfolioFilterFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = PortfolioFilter::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		$name = $this->faker->unique()->word;
		return [
			'short_name' => $name,
			'full_name' => ucfirst($name)
		];
	}
}
