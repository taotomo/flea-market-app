<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'name' => $this->faker->words(3, true),
            'brand' => $this->faker->company(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(100, 50000),
            'image' => 'sample.jpg',
            'condition_id' => $this->faker->numberBetween(1, 4), // テスト用の1-4に変更
        ];
    }
}
