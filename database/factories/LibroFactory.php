<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "titulo"=>$this->faker->unique()->word(),
            "resumen"=>$this->faker->word(),
            "pvp"=>$this->faker->randomFloat(2,5,999),
            "stock"=>$this->faker->randomNumber(),
            "user_id"=>User::all()->random()->id
        ];
    }
}
