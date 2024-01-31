<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\SubscriberType;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubscriberTypeControllerTest extends TestCase
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
    public function it_displays_index_view_with_subscriber_types(): void
    {
        $subscriberTypes = SubscriberType::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('subscriber-types.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.subscriber_types.index')
            ->assertViewHas('subscriberTypes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_subscriber_type(): void
    {
        $response = $this->get(route('subscriber-types.create'));

        $response->assertOk()->assertViewIs('app.subscriber_types.create');
    }

    /**
     * @test
     */
    public function it_stores_the_subscriber_type(): void
    {
        $data = SubscriberType::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('subscriber-types.store'), $data);

        $this->assertDatabaseHas('subscriber_types', $data);

        $subscriberType = SubscriberType::latest('id')->first();

        $response->assertRedirect(
            route('subscriber-types.edit', $subscriberType)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_subscriber_type(): void
    {
        $subscriberType = SubscriberType::factory()->create();

        $response = $this->get(route('subscriber-types.show', $subscriberType));

        $response
            ->assertOk()
            ->assertViewIs('app.subscriber_types.show')
            ->assertViewHas('subscriberType');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_subscriber_type(): void
    {
        $subscriberType = SubscriberType::factory()->create();

        $response = $this->get(route('subscriber-types.edit', $subscriberType));

        $response
            ->assertOk()
            ->assertViewIs('app.subscriber_types.edit')
            ->assertViewHas('subscriberType');
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

        $response = $this->put(
            route('subscriber-types.update', $subscriberType),
            $data
        );

        $data['id'] = $subscriberType->id;

        $this->assertDatabaseHas('subscriber_types', $data);

        $response->assertRedirect(
            route('subscriber-types.edit', $subscriberType)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_subscriber_type(): void
    {
        $subscriberType = SubscriberType::factory()->create();

        $response = $this->delete(
            route('subscriber-types.destroy', $subscriberType)
        );

        $response->assertRedirect(route('subscriber-types.index'));

        $this->assertModelMissing($subscriberType);
    }
}
