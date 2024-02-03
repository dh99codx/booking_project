<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserProfileResource;
use App\Http\Resources\UserProfileCollection;

class UserUserProfilesController extends Controller
{
    public function index(Request $request, User $user): UserProfileCollection
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $userProfiles = $user
            ->userProfiles()
            ->search($search)
            ->latest()
            ->paginate();

        return new UserProfileCollection($userProfiles);
    }

    public function store(Request $request, User $user): UserProfileResource
    {
        $this->authorize('create', UserProfile::class);

        $validated = $request->validate([
            'contact_number_landline' => ['required', 'max:255', 'string'],
            'profile_picture' => ['image', 'max:1024', 'nullable'],
            'gothram' => ['required', 'max:255', 'string'],
            'rashi' => ['required', 'max:255', 'string'],
            'natchatram' => ['required', 'max:255', 'string'],
        ]);

        if ($request->hasFile('profile_picture')) {
            $validated['profile_picture'] = $request
                ->file('profile_picture')
                ->store('public');
        }

        $userProfile = $user->userProfiles()->create($validated);

        return new UserProfileResource($userProfile);
    }
}
