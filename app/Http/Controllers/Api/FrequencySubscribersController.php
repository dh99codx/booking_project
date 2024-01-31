<?php

namespace App\Http\Controllers\Api;

use App\Models\Frequency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubscriberResource;
use App\Http\Resources\SubscriberCollection;

class FrequencySubscribersController extends Controller
{
    public function index(
        Request $request,
        Frequency $frequency
    ): SubscriberCollection {
        $this->authorize('view', $frequency);

        $search = $request->get('search', '');

        $subscribers = $frequency
            ->subscribers()
            ->search($search)
            ->latest()
            ->paginate();

        return new SubscriberCollection($subscribers);
    }

    public function store(
        Request $request,
        Frequency $frequency
    ): SubscriberResource {
        $this->authorize('create', Subscriber::class);

        $validated = $request->validate([
            'status' => ['required', 'boolean'],
            'email' => ['required', 'email'],
            'subscriber_type_id' => ['required', 'exists:subscriber_types,id'],
        ]);

        $subscriber = $frequency->subscribers()->create($validated);

        return new SubscriberResource($subscriber);
    }
}
