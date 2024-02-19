<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Booking;

use App\Models\Hall;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookingControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_bookings(): void
    {
        $bookings = Booking::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('bookings.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.bookings.index')
            ->assertViewHas('bookings');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_booking(): void
    {
        $response = $this->get(route('bookings.create'));

        $response->assertOk()->assertViewIs('app.bookings.create');
    }

    /**
     * @test
     */
    public function it_stores_the_booking(): void
    {
        $data = Booking::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('bookings.store'), $data);

        $this->assertDatabaseHas('bookings', $data);

        $booking = Booking::latest('id')->first();

        $response->assertRedirect(route('bookings.edit', $booking));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_booking(): void
    {
        $booking = Booking::factory()->create();

        $response = $this->get(route('bookings.show', $booking));

        $response
            ->assertOk()
            ->assertViewIs('app.bookings.show')
            ->assertViewHas('booking');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_booking(): void
    {
        $booking = Booking::factory()->create();

        $response = $this->get(route('bookings.edit', $booking));

        $response
            ->assertOk()
            ->assertViewIs('app.bookings.edit')
            ->assertViewHas('booking');
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

        $response = $this->put(route('bookings.update', $booking), $data);

        $data['id'] = $booking->id;

        $this->assertDatabaseHas('bookings', $data);

        $response->assertRedirect(route('bookings.edit', $booking));
    }

    /**
     * @test
     */
    public function it_deletes_the_booking(): void
    {
        $booking = Booking::factory()->create();

        $response = $this->delete(route('bookings.destroy', $booking));

        $response->assertRedirect(route('bookings.index'));

        $this->assertModelMissing($booking);
    }
}
