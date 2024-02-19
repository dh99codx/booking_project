<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Hall;
use App\Models\Booking;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HallBookingsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_hall_bookings(): void
    {
        $hall = Hall::factory()->create();
        $bookings = Booking::factory()
            ->count(2)
            ->create([
                'hall_id' => $hall->id,
            ]);

        $response = $this->getJson(route('api.halls.bookings.index', $hall));

        $response->assertOk()->assertSee($bookings[0]->Booking_Reference_No);
    }

    /**
     * @test
     */
    public function it_stores_the_hall_bookings(): void
    {
        $hall = Hall::factory()->create();
        $data = Booking::factory()
            ->make([
                'hall_id' => $hall->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.halls.bookings.store', $hall),
            $data
        );

        $this->assertDatabaseHas('bookings', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $booking = Booking::latest('id')->first();

        $this->assertEquals($hall->id, $booking->hall_id);
    }
}
