<?php

namespace Database\Factories;

use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Libro::class;
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence('1'),
            'autor' => $this->faker->name()
        ];
    }
}