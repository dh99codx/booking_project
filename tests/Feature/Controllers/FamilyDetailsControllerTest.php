<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\FamilyDetails;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FamilyDetailsControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_family_details(): void
    {
        $allFamilyDetails = FamilyDetails::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-family-details.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_family_details.index')
            ->assertViewHas('allFamilyDetails');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_family_details(): void
    {
        $response = $this->get(route('all-family-details.create'));

        $response->assertOk()->assertViewIs('app.all_family_details.create');
    }

    /**
     * @test
     */
    public function it_stores_the_family_details(): void
    {
        $data = FamilyDetails::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-family-details.store'), $data);

        $this->assertDatabaseHas('family_details', $data);

        $familyDetails = FamilyDetails::latest('id')->first();

        $response->assertRedirect(
            route('all-family-details.edit', $familyDetails)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_family_details(): void
    {
        $familyDetails = FamilyDetails::factory()->create();

        $response = $this->get(
            route('all-family-details.show', $familyDetails)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_family_details.show')
            ->assertViewHas('familyDetails');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_family_details(): void
    {
        $familyDetails = FamilyDetails::factory()->create();

        $response = $this->get(
            route('all-family-details.edit', $familyDetails)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_family_details.edit')
            ->assertViewHas('familyDetails');
    }

    /**
     * @test
     */
    public function it_updates_the_family_details(): void
    {
        $familyDetails = FamilyDetails::factory()->create();

        $data = [
            'given_name' => $this->faker->text(255),
            'middle_name' => $this->faker->text(255),
            'family_name' => $this->faker->text(255),
            'email_address' => $this->faker->text(255),
            'contact_number' => $this->faker->text(255),
            'dob' => $this->faker->date(),
            'relationship' => $this->faker->text(255),
            'gothram' => $this->faker->text(255),
            'rashi' => $this->faker->text(255),
            'natchatram' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('all-family-details.update', $familyDetails),
            $data
        );

        $data['id'] = $familyDetails->id;

        $this->assertDatabaseHas('family_details', $data);

        $response->assertRedirect(
            route('all-family-details.edit', $familyDetails)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_family_details(): void
    {
        $familyDetails = FamilyDetails::factory()->create();

        $response = $this->delete(
            route('all-family-details.destroy', $familyDetails)
        );

        $response->assertRedirect(route('all-family-details.index'));

        $this->assertModelMissing($familyDetails);
    }
}
