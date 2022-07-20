<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Product::class;
    public function definition()
    {
        return [
            'description' => $this->faker->sentence(1),
            'idcategory' => $this->faker->numberBetween(1, 29),
            'idunit' => $this->faker->numberBetween(1, 29),
            'stock' => $this->faker->numberBetween(0, 350),
            'price' => $this->faker->numberBetween(0, 1350),
            'status' => 1,
        ];
    }
}
