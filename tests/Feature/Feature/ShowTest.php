<?php

namespace Tests\Feature\Feature;

use App\Models\Show;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFind()
    {
        // Arrange
        $theatreId = 1; // ID of the theatre to search for

        // Create a sample show for the given theatre ID
        $sampleShow = Show::factory()->create(['theatre_id' => $theatreId]);

        // Act
        $shows = Show::find($theatreId)->get();

        // Assert
        $this->assertCount(1, $shows);
        $this->assertEquals($sampleShow->id, $shows->first()->id);
        $this->assertEquals($sampleShow->film->name, $shows->first()->film->name);
        // Add more assertions as per your Show and Film model properties

        // Additional assertion to check all retrieved shows
        foreach ($shows as $show) {
            $this->assertEquals($theatreId, $show->theatre_id);
        }
    }
}
