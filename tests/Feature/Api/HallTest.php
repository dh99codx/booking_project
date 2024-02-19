<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Hall;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HallTest extends TestCase
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
    public function it_gets_halls_list(): void
    {
        $halls = Hall::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.halls.index'));

        $response->assertOk()->assertSee($halls[0]->Name);
    }

    /**
     * @test
     */
    public function it_stores_the_hall(): void
    {
        $data = Hall::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.halls.store'), $data);

        $this->assertDatabaseHas('halls', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(route('api.halls.update', $hall), $data);

        $data['id'] = $hall->id;

        $this->assertDatabaseHas('halls', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_hall(): void
    {
        $hall = Hall::factory()->create();

        $response = $this->deleteJson(route('api.halls.destroy', $hall));

        $this->assertModelMissing($hall);

        $response->assertNoContent();
    }
}
