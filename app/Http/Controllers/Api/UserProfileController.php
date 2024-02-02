<?php

namespace App\Http\Controllers\Api;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\UserProfileResource;
use App\Http\Resources\UserProfileCollection;
use App\Http\Requests\UserProfileStoreRequest;
use App\Http\Requests\UserProfileUpdateRequest;

class UserProfileController extends Controller
{
    public function index(Request $request): UserProfileCollection
    {
        $this->authorize('view-any', UserProfile::class);

        $search = $request->get('search', '');

        $userProfiles = UserProfile::search($search)
            ->latest()
            ->paginate();

        return new UserProfileCollection($userProfiles);
    }

    public function store(UserProfileStoreRequest $request): UserProfileResource
    {
        $this->authorize('create', UserProfile::class);

        $validated = $request->validated();
        if ($request->hasFile('profile_picture')) {
            $validated['profile_picture'] = $request
                ->file('profile_picture')
                ->store('public');
        }

        $userProfile = UserProfile::create($validated);

        return new UserProfileResource($userProfile);
    }

    public function show(
        Request $request,
        UserProfile $userProfile
    ): UserProfileResource {
        $this->authorize('view', $userProfile);

        return new UserProfileResource($userProfile);
    }

    public function update(
        UserProfileUpdateRequest $request,
        UserProfile $userProfile
    ): UserProfileResource {
        $this->authorize('update', $userProfile);

        $validated = $request->validated();

        if ($request->hasFile('profile_picture')) {
            if ($userProfile->profile_picture) {
                Storage::delete($userProfile->profile_picture);
            }

            $validated['profile_picture'] = $request
                ->file('profile_picture')
                ->store('public');
        }

        $userProfile->update($validated);

        return new UserProfileResource($userProfile);
    }

    public function destroy(
        Request $request,
        UserProfile $userProfile
    ): Response {
        $this->authorize('delete', $userProfile);

        if ($userProfile->profile_picture) {
            Storage::delete($userProfile->profile_picture);
        }

        $userProfile->delete();

        return response()->noContent();
    }
}
