<?php

namespace Database\Factories;

use App\Models\Exercise;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExerciseFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Exercise::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		// Генерируем начало занятий
		$exerciseStart = $this->faker->time($format = 'H');
		// Генерируем продолжительность занятий
		$exerciseDuration = rand ( 1, 3 );
		return [
			// схема времени занятий
			'time' => $exerciseStart .':00 - '. ($exerciseStart + $exerciseDuration) .':00',
			// генерируем название занятий
			'class' => ucfirst($this->faker->words(2, true)),
			// генерируем описание
			'description' => $this->faker->words(2, true),
			// генерируем цену
			'price' => $this->faker->randomNumber(2)
		];
	}
}
