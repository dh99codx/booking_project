<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Subscriber;
use App\Models\SubscriberType;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubscriberTypeSubscribersTest extends TestCase
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
    public function it_gets_subscriber_type_subscribers(): void
    {
        $subscriberType = SubscriberType::factory()->create();
        $subscribers = Subscriber::factory()
            ->count(2)
            ->create([
                'subscriber_type_id' => $subscriberType->id,
            ]);

        $response = $this->getJson(
            route('api.subscriber-types.subscribers.index', $subscriberType)
        );

        $response->assertOk()->assertSee($subscribers[0]->token);
    }

    /**
     * @test
     */
    public function it_stores_the_subscriber_type_subscribers(): void
    {
        $subscriberType = SubscriberType::factory()->create();
        $data = Subscriber::factory()
            ->make([
                'subscriber_type_id' => $subscriberType->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.subscriber-types.subscribers.store', $subscriberType),
            $data
        );

        $this->assertDatabaseHas('subscribers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $subscriber = Subscriber::latest('id')->first();

        $this->assertEquals(
            $subscriberType->id,
            $subscriber->subscriber_type_id
        );
    }
}
