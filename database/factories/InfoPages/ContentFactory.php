<?php

namespace Database\Factories\InfoPages;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rv\Department>
 */
class ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'data' => $this->faker->word(),
            'fromdate' => Carbon::today(),
            'todate' => Carbon::now()->addCentury(1),
        ];
    }
}
