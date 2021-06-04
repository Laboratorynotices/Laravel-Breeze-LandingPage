<?php

namespace Database\Factories;

use App\Models\AboutBlock;
use Illuminate\Database\Eloquent\Factories\Factory;

class AboutBlockFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = AboutBlock::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			// Генерирует число от 1 до 2
			'image' => '' . $this->faker->numberBetween(1,2) . '.jpg',
			// Выбирает одно выражение из массива
			'title' => $this->faker->randomElement(['About Us', 'Professional Team']),
			// Текст из 400 символов
			'text' => $this->faker->text(400)
		];
	}
}
