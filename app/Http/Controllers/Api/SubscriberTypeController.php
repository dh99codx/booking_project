<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\SubscriberType;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubscriberTypeResource;
use App\Http\Resources\SubscriberTypeCollection;
use App\Http\Requests\SubscriberTypeStoreRequest;
use App\Http\Requests\SubscriberTypeUpdateRequest;

class SubscriberTypeController extends Controller
{
    public function index(Request $request): SubscriberTypeCollection
    {
        $this->authorize('view-any', SubscriberType::class);

        $search = $request->get('search', '');

        $subscriberTypes = SubscriberType::search($search)
            ->latest()
            ->paginate();

        return new SubscriberTypeCollection($subscriberTypes);
    }

    public function store(
        SubscriberTypeStoreRequest $request
    ): SubscriberTypeResource {
        $this->authorize('create', SubscriberType::class);

        $validated = $request->validated();

        $subscriberType = SubscriberType::create($validated);

        return new SubscriberTypeResource($subscriberType);
    }

    public function show(
        Request $request,
        SubscriberType $subscriberType
    ): SubscriberTypeResource {
        $this->authorize('view', $subscriberType);

        return new SubscriberTypeResource($subscriberType);
    }

    public function update(
        SubscriberTypeUpdateRequest $request,
        SubscriberType $subscriberType
    ): SubscriberTypeResource {
        $this->authorize('update', $subscriberType);

        $validated = $request->validated();

        $subscriberType->update($validated);

        return new SubscriberTypeResource($subscriberType);
    }

    public function destroy(
        Request $request,
        SubscriberType $subscriberType
    ): Response {
        $this->authorize('delete', $subscriberType);

        $subscriberType->delete();

        return response()->noContent();
    }
}
