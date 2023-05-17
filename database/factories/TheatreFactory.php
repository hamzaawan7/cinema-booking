<?php

namespace Database\Factories;

use App\Models\Theatre;
use Illuminate\Database\Eloquent\Factories\Factory;

class TheatreFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Theatre::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => ucfirst($this->faker->word) . ' Theatre',
            'max_seats' => 30,
        ];
    }
}
