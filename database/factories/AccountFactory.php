<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Currency;
use App\Services\ColorService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'    => fake()->word(),
            'balance' => $this->faker->numberBetween(1000, 100000),
            'currency_id' => Currency::getCurrencyByCode('BGN')->id,
            'color'   => '#' . ColorService::randomColor(),
        ];
    }
}
