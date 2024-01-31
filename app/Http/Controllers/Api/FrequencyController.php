<?php

namespace App\Http\Controllers\Api;

use App\Models\Frequency;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\FrequencyResource;
use App\Http\Resources\FrequencyCollection;
use App\Http\Requests\FrequencyStoreRequest;
use App\Http\Requests\FrequencyUpdateRequest;

class FrequencyController extends Controller
{
    public function index(Request $request): FrequencyCollection
    {
        $this->authorize('view-any', Frequency::class);

        $search = $request->get('search', '');

        $frequencies = Frequency::search($search)
            ->latest()
            ->paginate();

        return new FrequencyCollection($frequencies);
    }

    public function store(FrequencyStoreRequest $request): FrequencyResource
    {
        $this->authorize('create', Frequency::class);

        $validated = $request->validated();

        $frequency = Frequency::create($validated);

        return new FrequencyResource($frequency);
    }

    public function show(
        Request $request,
        Frequency $frequency
    ): FrequencyResource {
        $this->authorize('view', $frequency);

        return new FrequencyResource($frequency);
    }

    public function update(
        FrequencyUpdateRequest $request,
        Frequency $frequency
    ): FrequencyResource {
        $this->authorize('update', $frequency);

        $validated = $request->validated();

        $frequency->update($validated);

        return new FrequencyResource($frequency);
    }

    public function destroy(Request $request, Frequency $frequency): Response
    {
        $this->authorize('delete', $frequency);

        $frequency->delete();

        return response()->noContent();
    }
}
