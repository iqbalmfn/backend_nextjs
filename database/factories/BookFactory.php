<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'category_id' => rand(1, 4),
      'name' => $this->faker->sentence(5),
      'price' => rand(10000, 200000),
      'description' => $this->faker->sentence(30),
    ];
  }
}
