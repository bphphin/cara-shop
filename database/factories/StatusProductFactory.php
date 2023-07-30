<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StatusProduct>
 */
class StatusProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\StatusProduct::class;
    public function definition(): array
    {
        return [
            'status' => $this->faker->name,
            'description' => $this->faker->paragraph
        ];
    }
}
