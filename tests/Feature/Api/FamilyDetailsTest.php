<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\FamilyDetails;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FamilyDetailsTest extends TestCase
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
    public function it_gets_all_family_details_list(): void
    {
        $allFamilyDetails = FamilyDetails::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-family-details.index'));

        $response->assertOk()->assertSee($allFamilyDetails[0]->given_name);
    }

    /**
     * @test
     */
    public function it_stores_the_family_details(): void
    {
        $data = FamilyDetails::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.all-family-details.store'),
            $data
        );

        $this->assertDatabaseHas('family_details', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.all-family-details.update', $familyDetails),
            $data
        );

        $data['id'] = $familyDetails->id;

        $this->assertDatabaseHas('family_details', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_family_details(): void
    {
        $familyDetails = FamilyDetails::factory()->create();

        $response = $this->deleteJson(
            route('api.all-family-details.destroy', $familyDetails)
        );

        $this->assertModelMissing($familyDetails);

        $response->assertNoContent();
    }
}
