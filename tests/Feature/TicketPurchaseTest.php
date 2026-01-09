<?php

namespace Tests\Feature;

use App\Models\Movie;
use App\Models\Showtime;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketPurchaseTest extends TestCase
{
    use RefreshDatabase;  
  
    public function test_authenticated_user_can_purchase_ticket()
    {
        $user = User::factory()->create();
        $movie = Movie::factory()->create();

        $showtime = Showtime::create([
            'movie_id' => $movie->id,
            'starts_at' => now()->addDay(),
            'room' => 'Sala Test',
            'ticket_price' => 500
        ]);

        $response = $this->actingAs($user)->postJson('/api/tickets', [
            'showtime_id' => $showtime->id,
            'seat_number' => 'C-5'
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('tickets', [
            'user_id' => $user->id,
            'showtime_id' => $showtime->id,
            'seat_number' => 'C-5',
            'price_paid' => 500
        ]);
    }
}
