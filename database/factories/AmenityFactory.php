<?php

namespace Database\Factories;

use App\Models\Amenity;
use Illuminate\Database\Eloquent\Factories\Factory;

class AmenityFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Amenity::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			// Генерирует одну из следующих иконок
			'icon' => $this->faker->randomElement(['ti-share-alt', 'ti-pulse', 'ti-panel']),
			// Выбирает одно выражение из массива
			'title' => $this->faker->randomElement(['Steam Bath', 'Wi-Fi', 'Air Conditioned']),
			// Текст из 200 символов
			'description' => $this->faker->text(200)
		];
	}
}
