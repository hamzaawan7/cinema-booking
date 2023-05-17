<?php

namespace Database\Seeders;

use App\Models\Cinema;
use App\Models\Film;
use App\Models\Show;
use App\Models\Theatre;
use Illuminate\Database\Seeder;

class CinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cinema1 = Cinema::factory()->createOne();
        $cinema2 = Cinema::factory()->createOne();

        // Create two theaters for each cinema
        $theatres1 = Theatre::factory(2)->create(['cinema_id' => $cinema1->id]);
        $theatres2 = Theatre::factory(2)->create(['cinema_id' => $cinema2->id]);

        // Create two films
        $film1 = Film::factory()->createOne();
        $film2 = Film::factory()->createOne();

        // Assign films to theaters in cinema 1
        foreach ($theatres1 as $theatre) {
            Show::factory()->createOne(['theatre_id' => $theatre->id, 'film_id' => $film1->id]);
            Show::factory()->createOne(['theatre_id' => $theatre->id, 'film_id' => $film2->id]);
        }

        // Assign films to theaters in cinema 2
        foreach ($theatres2 as $theatre) {
            Show::factory()->createOne(['theatre_id' => $theatre->id, 'film_id' => $film1->id]);
            Show::factory()->createOne(['theatre_id' => $theatre->id, 'film_id' => $film2->id]);
        }
    }
}
