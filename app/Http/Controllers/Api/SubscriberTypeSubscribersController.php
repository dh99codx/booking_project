<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\SubscriberType;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubscriberResource;
use App\Http\Resources\SubscriberCollection;

class SubscriberTypeSubscribersController extends Controller
{
    public function index(
        Request $request,
        SubscriberType $subscriberType
    ): SubscriberCollection {
        $this->authorize('view', $subscriberType);

        $search = $request->get('search', '');

        $subscribers = $subscriberType
            ->subscribers()
            ->search($search)
            ->latest()
            ->paginate();

        return new SubscriberCollection($subscribers);
    }

    public function store(
        Request $request,
        SubscriberType $subscriberType
    ): SubscriberResource {
        $this->authorize('create', Subscriber::class);

        $validated = $request->validate([
            'status' => ['required', 'boolean'],
            'email' => ['required', 'email'],
        ]);

        $subscriber = $subscriberType->subscribers()->create($validated);

        return new SubscriberResource($subscriber);
    }
}
