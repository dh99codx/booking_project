<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Frequency;
use App\Models\Subscriber;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FrequencySubscribersTest extends TestCase
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
    public function it_gets_frequency_subscribers(): void
    {
        $frequency = Frequency::factory()->create();
        $subscribers = Subscriber::factory()
            ->count(2)
            ->create([
                'frequency_id' => $frequency->id,
            ]);

        $response = $this->getJson(
            route('api.frequencies.subscribers.index', $frequency)
        );

        $response->assertOk()->assertSee($subscribers[0]->token);
    }

    /**
     * @test
     */
    public function it_stores_the_frequency_subscribers(): void
    {
        $frequency = Frequency::factory()->create();
        $data = Subscriber::factory()
            ->make([
                'frequency_id' => $frequency->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.frequencies.subscribers.store', $frequency),
            $data
        );

        $this->assertDatabaseHas('subscribers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $subscriber = Subscriber::latest('id')->first();

        $this->assertEquals($frequency->id, $subscriber->frequency_id);
    }
}
