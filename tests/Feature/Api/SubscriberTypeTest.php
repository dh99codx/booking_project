<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\SubscriberType;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubscriberTypeTest extends TestCase
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
    public function it_gets_subscriber_types_list(): void
    {
        $subscriberTypes = SubscriberType::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.subscriber-types.index'));

        $response->assertOk()->assertSee($subscriberTypes[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_subscriber_type(): void
    {
        $data = SubscriberType::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.subscriber-types.store'), $data);

        $this->assertDatabaseHas('subscriber_types', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_subscriber_type(): void
    {
        $subscriberType = SubscriberType::factory()->create();

        $data = [
            'name' => $this->faker->name(),
        ];

        $response = $this->putJson(
            route('api.subscriber-types.update', $subscriberType),
            $data
        );

        $data['id'] = $subscriberType->id;

        $this->assertDatabaseHas('subscriber_types', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_subscriber_type(): void
    {
        $subscriberType = SubscriberType::factory()->create();

        $response = $this->deleteJson(
            route('api.subscriber-types.destroy', $subscriberType)
        );

        $this->assertModelMissing($subscriberType);

        $response->assertNoContent();
    }
}
