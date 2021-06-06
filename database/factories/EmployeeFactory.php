<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Employee::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			// Генерирует число от 1 до 4
			'image' => '' . $this->faker->numberBetween(1,4) . '.jpg',
			// Генерирует имя
			'name' => '' . $this->faker->name,
			// Выбирает одно выражение из массива
			'position' => $this->faker->randomElement(['CEO', 'Trainer'])
		];
	}
}
