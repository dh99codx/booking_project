<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Frequency;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FrequencyTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_frequencies_list(): void
    {
        $frequencies = Frequency::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.frequencies.index'));

        $response->assertOk()->assertSee($frequencies[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_frequency(): void
    {
        $data = Frequency::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.frequencies.store'), $data);

        $this->assertDatabaseHas('frequencies', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_frequency(): void
    {
        $frequency = Frequency::factory()->create();

        $data = [
            'name' => $this->faker->text(255),
            'days' => $this->faker->randomNumber(0),
        ];

        $response = $this->putJson(
            route('api.frequencies.update', $frequency),
            $data
        );

        $data['id'] = $frequency->id;

        $this->assertDatabaseHas('frequencies', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_frequency(): void
    {
        $frequency = Frequency::factory()->create();

        $response = $this->deleteJson(
            route('api.frequencies.destroy', $frequency)
        );

        $this->assertModelMissing($frequency);

        $response->assertNoContent();
    }
}
