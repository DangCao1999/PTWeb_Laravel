<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(20),
            'price' => $this->faker->numberBetween(500000, 1000000),
            'gender' => 'male',
            'pictureURL' => $this->faker->sentence(20),
            "amount" => $this->faker->numberBetween(0,10),
        ];
    }
}
