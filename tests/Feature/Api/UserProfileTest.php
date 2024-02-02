<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\UserProfile;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserProfileTest extends TestCase
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
    public function it_gets_user_profiles_list(): void
    {
        $userProfiles = UserProfile::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.user-profiles.index'));

        $response->assertOk()->assertSee($userProfiles[0]->profile_picture);
    }

    /**
     * @test
     */
    public function it_stores_the_user_profile(): void
    {
        $data = UserProfile::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.user-profiles.store'), $data);

        unset($data['user_id']);

        $this->assertDatabaseHas('user_profiles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_user_profile(): void
    {
        $userProfile = UserProfile::factory()->create();

        $user = User::factory()->create();

        $data = [
            'contact_number_landline' => $this->faker->text(255),
            'gothram' => $this->faker->text(255),
            'rashi' => $this->faker->text(255),
            'natchatram' => $this->faker->text(255),
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.user-profiles.update', $userProfile),
            $data
        );

        unset($data['user_id']);

        $data['id'] = $userProfile->id;

        $this->assertDatabaseHas('user_profiles', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_user_profile(): void
    {
        $userProfile = UserProfile::factory()->create();

        $response = $this->deleteJson(
            route('api.user-profiles.destroy', $userProfile)
        );

        $this->assertModelMissing($userProfile);

        $response->assertNoContent();
    }
}
