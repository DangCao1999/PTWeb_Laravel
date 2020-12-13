<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Order;
class OrderDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "oid" => Order::all()->random()->id,
            "pid"=> Product::all()->random()->id,
            "quantity"=>$this->faker->numberBetween(3,10),
            //
        ];
    }
}
