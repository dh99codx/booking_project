<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Subscriber;

use App\Models\SubscriberType;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubscriberTest extends TestCase
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
    public function it_gets_subscribers_list(): void
    {
        $subscribers = Subscriber::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.subscribers.index'));

        $response->assertOk()->assertSee($subscribers[0]->email);
    }

    /**
     * @test
     */
    public function it_stores_the_subscriber(): void
    {
        $data = Subscriber::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.subscribers.store'), $data);

        $this->assertDatabaseHas('subscribers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_subscriber(): void
    {
        $subscriber = Subscriber::factory()->create();

        $subscriberType = SubscriberType::factory()->create();

        $data = [
            'status' => $this->faker->boolean(),
            'email' => $this->faker->email(),
            'subscriber_type_id' => $subscriberType->id,
        ];

        $response = $this->putJson(
            route('api.subscribers.update', $subscriber),
            $data
        );

        $data['id'] = $subscriber->id;

        $this->assertDatabaseHas('subscribers', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_subscriber(): void
    {
        $subscriber = Subscriber::factory()->create();

        $response = $this->deleteJson(
            route('api.subscribers.destroy', $subscriber)
        );

        $this->assertModelMissing($subscriber);

        $response->assertNoContent();
    }
}
