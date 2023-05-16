<?php

namespace Database\Seeders;

use App\Models\Cinema;
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
        Cinema::factory(2)
            ->has(Theatre::factory()
                ->count(2))->create();
    }
}
