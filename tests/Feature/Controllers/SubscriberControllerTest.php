<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Subscriber;

use App\Models\SubscriberType;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubscriberControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_subscribers(): void
    {
        $subscribers = Subscriber::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('subscribers.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.subscribers.index')
            ->assertViewHas('subscribers');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_subscriber(): void
    {
        $response = $this->get(route('subscribers.create'));

        $response->assertOk()->assertViewIs('app.subscribers.create');
    }

    /**
     * @test
     */
    public function it_stores_the_subscriber(): void
    {
        $data = Subscriber::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('subscribers.store'), $data);

        $this->assertDatabaseHas('subscribers', $data);

        $subscriber = Subscriber::latest('id')->first();

        $response->assertRedirect(route('subscribers.edit', $subscriber));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_subscriber(): void
    {
        $subscriber = Subscriber::factory()->create();

        $response = $this->get(route('subscribers.show', $subscriber));

        $response
            ->assertOk()
            ->assertViewIs('app.subscribers.show')
            ->assertViewHas('subscriber');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_subscriber(): void
    {
        $subscriber = Subscriber::factory()->create();

        $response = $this->get(route('subscribers.edit', $subscriber));

        $response
            ->assertOk()
            ->assertViewIs('app.subscribers.edit')
            ->assertViewHas('subscriber');
    }

    /**
     * @test
     */
    public function it_updates_the_subscriber(): void
    {
        $subscriber = Subscriber::factory()->create();

        $subscriberType = SubscriberType::factory()->create();

        $data = [
            'email' => $this->faker->email(),
            'subscriber_type_id' => $subscriberType->id,
        ];

        $response = $this->put(route('subscribers.update', $subscriber), $data);

        $data['id'] = $subscriber->id;

        $this->assertDatabaseHas('subscribers', $data);

        $response->assertRedirect(route('subscribers.edit', $subscriber));
    }

    /**
     * @test
     */
    public function it_deletes_the_subscriber(): void
    {
        $subscriber = Subscriber::factory()->create();

        $response = $this->delete(route('subscribers.destroy', $subscriber));

        $response->assertRedirect(route('subscribers.index'));

        $this->assertModelMissing($subscriber);
    }
}
