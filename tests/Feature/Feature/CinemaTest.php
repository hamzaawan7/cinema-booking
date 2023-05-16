<?php

namespace Tests\Feature\Feature;

use App\Models\Theatre;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Cinema;

class CinemaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAll()
    {
        $cinemas = Cinema::all();

        foreach ($cinemas as $cinema) {
            $this->assertInstanceOf(Cinema::class, $cinema);
        }
    }

    public function testFind()
    {
        $cinemaId = 1; // ID of the cinema to search for

        // Create a sample theatre for the given cinema ID
        $sampleTheatre = Theatre::factory()->create(['cinema_id' => $cinemaId]);

        // Act
        $theatres = Cinema::find($cinemaId);

        // Assert
        $this->assertCount(1, $theatres);
        $this->assertEquals($sampleTheatre->id, $theatres->first()->id);
        $this->assertEquals($sampleTheatre->name, $theatres->first()->name);
    }
}
