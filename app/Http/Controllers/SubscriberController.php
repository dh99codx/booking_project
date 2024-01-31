<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Models\SubscriberType;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SubscriberStoreRequest;
use App\Http\Requests\SubscriberUpdateRequest;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Subscriber::class);

        $search = $request->get('search', '');

        $subscribers = Subscriber::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.subscribers.index', compact('subscribers', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Subscriber::class);

        $subscriberTypes = SubscriberType::pluck('name', 'id');

        return view('app.subscribers.create', compact('subscriberTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubscriberStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Subscriber::class);

        $validated = $request->validated();

        $subscriber = Subscriber::create($validated);

        return redirect()
            ->route('subscribers.edit', $subscriber)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Subscriber $subscriber): View
    {
        $this->authorize('view', $subscriber);

        return view('app.subscribers.show', compact('subscriber'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Subscriber $subscriber): View
    {
        $this->authorize('update', $subscriber);

        $subscriberTypes = SubscriberType::pluck('name', 'id');

        return view(
            'app.subscribers.edit',
            compact('subscriber', 'subscriberTypes')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        SubscriberUpdateRequest $request,
        Subscriber $subscriber
    ): RedirectResponse {
        $this->authorize('update', $subscriber);

        $validated = $request->validated();

        $subscriber->update($validated);

        return redirect()
            ->route('subscribers.edit', $subscriber)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Subscriber $subscriber
    ): RedirectResponse {
        $this->authorize('delete', $subscriber);

        $subscriber->delete();

        return redirect()
            ->route('subscribers.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
