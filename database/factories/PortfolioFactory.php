<?php

namespace Database\Factories;

use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Factories\Factory;

class PortfolioFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Portfolio::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			// Генерирует число от 1 до 8
			'image' => 'img' . $this->faker->numberBetween(1,8) . '.jpg',
			// Выбирает одно выражение из массива
			'filter' => $this->faker->randomElement(['Graphic', 'UI Project', 'Fullstack'])
		];
	}
}
