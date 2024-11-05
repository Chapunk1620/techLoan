<?php

namespace Database\Factories;

use App\Models\Loan;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanFactory extends Factory
{
    protected $model = Loan::class;

    public function definition(): array
    {
        $date = $this->faker->dateTimeBetween('-1 year', 'now');
        $due_date = $this->faker->dateTimeBetween($date, '+6 months');

        return [
            'id_borrower' => $this->faker->unique()->randomNumber(5),
            'borrower_name' => $this->faker->name(),
            'item_key' => Item::inRandomOrder()->first()->item_key,
            'date' => $date,
            'due_date' => $due_date,
            'status' => $this->faker->randomElement(['Pending', 'Returned', 'Overdue']),
            'description' => $this->faker->optional()->sentence(),
            'after_condition' => $this->faker->imageUrl(640, 480),
            'it_approver' => $this->faker->name(),
            'it_receiver' => $this->faker->name(),
            'item_returner_name' => $this->faker->name(),
            'item_returner_id' => $this->faker->unique()->randomNumber(5),
        ];
    }
}