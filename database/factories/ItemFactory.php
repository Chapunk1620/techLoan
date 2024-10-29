<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'item_key' => $this->faker->unique()->bothify('ITEM_##??'),
            'item_type' => $this->faker->randomElement(['product', 'service', 'digital', 'physical']),
            'attachment' => $this->faker->optional(0.7)->imageUrl(),
            'status' => $this->faker->randomElement(['Available', 'Borrowed']),
            'date_arrival' => $this->faker->dateTimeBetween('-1 year', 'now'), // Adding date_arrival
        ];
    }
}