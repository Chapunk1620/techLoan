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
            'status' => $this->faker->randomElement(['pending', 'approved', 'returned', 'overdue']),
            'description' => $this->faker->optional()->sentence(),
            'it_approver' => $this->faker->name(),
            'it_receiver' => $this->faker->name(),
        ];
    }
}