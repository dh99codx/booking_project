<?php

namespace App\Http\Controllers\Api;

use App\Models\Hall;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\HallResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\HallCollection;
use App\Http\Requests\HallStoreRequest;
use App\Http\Requests\HallUpdateRequest;

class HallController extends Controller
{
    public function index(Request $request): HallCollection
    {
        $this->authorize('view-any', Hall::class);

        $search = $request->get('search', '');

        $halls = Hall::search($search)
            ->latest()
            ->paginate();

        return new HallCollection($halls);
    }

    public function store(HallStoreRequest $request): HallResource
    {
        $this->authorize('create', Hall::class);

        $validated = $request->validated();

        $hall = Hall::create($validated);

        return new HallResource($hall);
    }

    public function show(Request $request, Hall $hall): HallResource
    {
        $this->authorize('view', $hall);

        return new HallResource($hall);
    }

    public function update(HallUpdateRequest $request, Hall $hall): HallResource
    {
        $this->authorize('update', $hall);

        $validated = $request->validated();

        $hall->update($validated);

        return new HallResource($hall);
    }

    public function destroy(Request $request, Hall $hall): Response
    {
        $this->authorize('delete', $hall);

        $hall->delete();

        return response()->noContent();
    }
}
