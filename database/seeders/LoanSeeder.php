<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Loan;
use App\Models\Item;

class LoanSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure we have items to reference
        if (Item::count() == 0) {
            $this->call(ItemSeeder::class);
        }

        Loan::factory()->count(100)->create();
    }
}