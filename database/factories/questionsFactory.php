<?php

namespace Database\Factories;

use App\Models\questions;
use Illuminate\Database\Eloquent\Factories\Factory;

class questionsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = questions::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "question" => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            "a" => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            "b" => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            "c" => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            "d" => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            "answer" => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            "category_id" => $this->faker->numberBetween(1, 5),
            "vocabulary_id" => $this->faker->numberBetween(1, 200),
        ];
    }
}