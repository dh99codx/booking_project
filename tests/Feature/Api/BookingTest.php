<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Booking;

use App\Models\Hall;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookingTest extends TestCase
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
    public function it_gets_bookings_list(): void
    {
        $bookings = Booking::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.bookings.index'));

        $response->assertOk()->assertSee($bookings[0]->Booking_Reference_No);
    }

    /**
     * @test
     */
    public function it_stores_the_booking(): void
    {
        $data = Booking::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.bookings.store'), $data);

        $this->assertDatabaseHas('bookings', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_booking(): void
    {
        $booking = Booking::factory()->create();

        $user = User::factory()->create();
        $hall = Hall::factory()->create();

        $data = [
            'Check_In' => $this->faker->dateTime(),
            'Check_Out' => $this->faker->dateTime(),
            'Booking_Reference_No' => $this->faker->text(255),
            'Customer_Given_Name' => $this->faker->text(255),
            'Customer_Family_Name' => $this->faker->text(255),
            'Customer_Contact_Number' => $this->faker->text(255),
            'Customer_Email_Address' => $this->faker->text(255),
            'Total_Payment' => $this->faker->randomNumber(1),
            'Deposit_Made' => $this->faker->randomNumber(1),
            'Balance_Amount' => $this->faker->randomNumber(1),
            'Balance_Amount_Due' => $this->faker->randomNumber(1),
            'user_id' => $user->id,
            'hall_id' => $hall->id,
        ];

        $response = $this->putJson(
            route('api.bookings.update', $booking),
            $data
        );

        $data['id'] = $booking->id;

        $this->assertDatabaseHas('bookings', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_booking(): void
    {
        $booking = Booking::factory()->create();

        $response = $this->deleteJson(route('api.bookings.destroy', $booking));

        $this->assertModelMissing($booking);

        $response->assertNoContent();
    }
}
