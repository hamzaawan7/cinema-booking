<?php

namespace Database\Factories;

use App\Models\Cinema;
use App\Models\Film;
use App\Models\Show;
use App\Models\Theatre;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShowFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Show::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'available_seats' => 30,
            'show_time' => $this->faker->dateTimeBetween('+1 day', '+1 week')->format('Y-m-d H:00:00'),
        ];
    }
}
