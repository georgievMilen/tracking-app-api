<?php

namespace Database\Factories;

use App\Enums\CategoryTypeEnum;
use App\Models\Category;
use App\Services\ColorService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'type' => array_rand(CategoryTypeEnum::toArray()),
            'color' => '#' . ColorService::randomColor(),
        ];
    }
}
