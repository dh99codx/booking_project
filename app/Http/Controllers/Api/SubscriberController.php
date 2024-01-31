<?php

namespace App\Http\Controllers\Api;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubscriberResource;
use App\Http\Resources\SubscriberCollection;
use App\Http\Requests\SubscriberStoreRequest;
use App\Http\Requests\SubscriberUpdateRequest;

class SubscriberController extends Controller
{
    public function index(Request $request): SubscriberCollection
    {
        $this->authorize('view-any', Subscriber::class);

        $search = $request->get('search', '');

        $subscribers = Subscriber::search($search)
            ->latest()
            ->paginate();

        return new SubscriberCollection($subscribers);
    }

    public function store(SubscriberStoreRequest $request): SubscriberResource
    {
        $this->authorize('create', Subscriber::class);

        $validated = $request->validated();

        $subscriber = Subscriber::create($validated);

        return new SubscriberResource($subscriber);
    }

    public function show(
        Request $request,
        Subscriber $subscriber
    ): SubscriberResource {
        $this->authorize('view', $subscriber);

        return new SubscriberResource($subscriber);
    }

    public function update(
        SubscriberUpdateRequest $request,
        Subscriber $subscriber
    ): SubscriberResource {
        $this->authorize('update', $subscriber);

        $validated = $request->validated();

        $subscriber->update($validated);

        return new SubscriberResource($subscriber);
    }

    public function destroy(Request $request, Subscriber $subscriber): Response
    {
        $this->authorize('delete', $subscriber);

        $subscriber->delete();

        return response()->noContent();
    }
}
