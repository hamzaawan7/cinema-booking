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
        $theatres = Theatre::all();
        $films = Film::all();

        $theatre = $this->faker->randomElement($theatres);
        $film = $this->faker->randomElement($films);

        return [
            'theatre_id' => $theatre->id,
            'film_id' => $film->id,
            'available_seats' => 30,
            'show_time' => $this->faker->dateTimeBetween('+1 day', '+1 week'),
        ];
    }
}
