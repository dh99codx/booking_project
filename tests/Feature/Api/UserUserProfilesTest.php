<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\UserProfile;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserUserProfilesTest extends TestCase
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
    public function it_gets_user_user_profiles(): void
    {
        $user = User::factory()->create();
        $userProfiles = UserProfile::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(
            route('api.users.user-profiles.index', $user)
        );

        $response->assertOk()->assertSee($userProfiles[0]->profile_picture);
    }

    /**
     * @test
     */
    public function it_stores_the_user_user_profiles(): void
    {
        $user = User::factory()->create();
        $data = UserProfile::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.user-profiles.store', $user),
            $data
        );

        unset($data['user_id']);

        $this->assertDatabaseHas('user_profiles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $userProfile = UserProfile::latest('id')->first();

        $this->assertEquals($user->id, $userProfile->user_id);
    }
}
