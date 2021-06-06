<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Testimonial::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			// Текст из 110 символов
			'text' => $this->faker->text(110),
			// Генерирует число от 2 до 3
			'image' => 'img' . $this->faker->numberBetween(2,3) . '.jpg',
			// Генерирует имя
			'name' => '' . $this->faker->name,
			// Выбирает одно выражение из массива
			'position' => $this->faker->randomElement(['XL Director', 'VNT Manager'])
		];
	}
}
