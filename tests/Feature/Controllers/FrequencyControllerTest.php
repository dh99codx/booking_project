<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Frequency;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FrequencyControllerTest extends TestCase
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
    public function it_displays_index_view_with_frequencies(): void
    {
        $frequencies = Frequency::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('frequencies.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.frequencies.index')
            ->assertViewHas('frequencies');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_frequency(): void
    {
        $response = $this->get(route('frequencies.create'));

        $response->assertOk()->assertViewIs('app.frequencies.create');
    }

    /**
     * @test
     */
    public function it_stores_the_frequency(): void
    {
        $data = Frequency::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('frequencies.store'), $data);

        $this->assertDatabaseHas('frequencies', $data);

        $frequency = Frequency::latest('id')->first();

        $response->assertRedirect(route('frequencies.edit', $frequency));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_frequency(): void
    {
        $frequency = Frequency::factory()->create();

        $response = $this->get(route('frequencies.show', $frequency));

        $response
            ->assertOk()
            ->assertViewIs('app.frequencies.show')
            ->assertViewHas('frequency');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_frequency(): void
    {
        $frequency = Frequency::factory()->create();

        $response = $this->get(route('frequencies.edit', $frequency));

        $response
            ->assertOk()
            ->assertViewIs('app.frequencies.edit')
            ->assertViewHas('frequency');
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

        $response = $this->put(route('frequencies.update', $frequency), $data);

        $data['id'] = $frequency->id;

        $this->assertDatabaseHas('frequencies', $data);

        $response->assertRedirect(route('frequencies.edit', $frequency));
    }

    /**
     * @test
     */
    public function it_deletes_the_frequency(): void
    {
        $frequency = Frequency::factory()->create();

        $response = $this->delete(route('frequencies.destroy', $frequency));

        $response->assertRedirect(route('frequencies.index'));

        $this->assertModelMissing($frequency);
    }
}
