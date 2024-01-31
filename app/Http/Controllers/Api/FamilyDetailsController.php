<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\FamilyDetails;
use App\Http\Controllers\Controller;
use App\Http\Resources\FamilyDetailsResource;
use App\Http\Resources\FamilyDetailsCollection;
use App\Http\Requests\FamilyDetailsStoreRequest;
use App\Http\Requests\FamilyDetailsUpdateRequest;

class FamilyDetailsController extends Controller
{
    public function index(Request $request): FamilyDetailsCollection
    {
        $this->authorize('view-any', FamilyDetails::class);

        $search = $request->get('search', '');

        $allFamilyDetails = FamilyDetails::search($search)
            ->latest()
            ->paginate();

        return new FamilyDetailsCollection($allFamilyDetails);
    }

    public function store(
        FamilyDetailsStoreRequest $request
    ): FamilyDetailsResource {
        $this->authorize('create', FamilyDetails::class);

        $validated = $request->validated();

        $familyDetails = FamilyDetails::create($validated);

        return new FamilyDetailsResource($familyDetails);
    }

    public function show(
        Request $request,
        FamilyDetails $familyDetails
    ): FamilyDetailsResource {
        $this->authorize('view', $familyDetails);

        return new FamilyDetailsResource($familyDetails);
    }

    public function update(
        FamilyDetailsUpdateRequest $request,
        FamilyDetails $familyDetails
    ): FamilyDetailsResource {
        $this->authorize('update', $familyDetails);

        $validated = $request->validated();

        $familyDetails->update($validated);

        return new FamilyDetailsResource($familyDetails);
    }

    public function destroy(
        Request $request,
        FamilyDetails $familyDetails
    ): Response {
        $this->authorize('delete', $familyDetails);

        $familyDetails->delete();

        return response()->noContent();
    }
}
