<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // Генерирует число от 1 до 3
            'image' => '' . $this->faker->numberBetween(1,3) . '.jpg',
            // Выбирает одно выражение из массива
            'sport' => $this->faker->randomElement(['Aerobic', 'Body Building', 'Yoga']),
            // Три случайных слова
            'description' => $this->faker->words(3, true),
            // Текст из 350 символов
            'text' => $this->faker->text(350)
        ];
    }
}
