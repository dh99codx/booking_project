<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Hall;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HallControllerTest extends TestCase
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
    public function it_displays_index_view_with_halls(): void
    {
        $halls = Hall::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('halls.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.halls.index')
            ->assertViewHas('halls');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_hall(): void
    {
        $response = $this->get(route('halls.create'));

        $response->assertOk()->assertViewIs('app.halls.create');
    }

    /**
     * @test
     */
    public function it_stores_the_hall(): void
    {
        $data = Hall::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('halls.store'), $data);

        $this->assertDatabaseHas('halls', $data);

        $hall = Hall::latest('id')->first();

        $response->assertRedirect(route('halls.edit', $hall));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_hall(): void
    {
        $hall = Hall::factory()->create();

        $response = $this->get(route('halls.show', $hall));

        $response
            ->assertOk()
            ->assertViewIs('app.halls.show')
            ->assertViewHas('hall');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_hall(): void
    {
        $hall = Hall::factory()->create();

        $response = $this->get(route('halls.edit', $hall));

        $response
            ->assertOk()
            ->assertViewIs('app.halls.edit')
            ->assertViewHas('hall');
    }

    /**
     * @test
     */
    public function it_updates_the_hall(): void
    {
        $hall = Hall::factory()->create();

        $data = [
            'Name' => $this->faker->name(),
            'Price' => $this->faker->randomNumber(1),
        ];

        $response = $this->put(route('halls.update', $hall), $data);

        $data['id'] = $hall->id;

        $this->assertDatabaseHas('halls', $data);

        $response->assertRedirect(route('halls.edit', $hall));
    }

    /**
     * @test
     */
    public function it_deletes_the_hall(): void
    {
        $hall = Hall::factory()->create();

        $response = $this->delete(route('halls.destroy', $hall));

        $response->assertRedirect(route('halls.index'));

        $this->assertModelMissing($hall);
    }
}
