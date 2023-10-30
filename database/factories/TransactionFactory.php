<?php

namespace Database\Factories;

use App\Enums\CategoryTypeEnum;
use App\Models\Account;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type'        => array_rand(CategoryTypeEnum::toArray()),
            'account_id'  => Account::factory()->create()->id,
            'category_id' => Category::factory()->create()->id,
            'amount'      => $this->faker->numberBetween(100, 10000),
            'currency_id' => Currency::getCurrencyByCode('BGN')->id,
        ];
    }
}
