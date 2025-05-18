<?php

namespace Database\Factories;

use App\Models\Expense;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseFactory extends Factory
{
    protected $model = Expense::class;

    public function definition(): array
    {
        return [
            'project_id' => Project::factory(), // Or manually assign one later
            'amount' => $this->faker->randomFloat(2, 100, 1000),
            'description' => $this->faker->sentence(),
        ];
    }
}
