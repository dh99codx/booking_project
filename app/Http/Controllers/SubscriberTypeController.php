<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\SubscriberType;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SubscriberTypeStoreRequest;
use App\Http\Requests\SubscriberTypeUpdateRequest;

class SubscriberTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', SubscriberType::class);

        $search = $request->get('search', '');

        $subscriberTypes = SubscriberType::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.subscriber_types.index',
            compact('subscriberTypes', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', SubscriberType::class);

        return view('app.subscriber_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubscriberTypeStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', SubscriberType::class);

        $validated = $request->validated();

        $subscriberType = SubscriberType::create($validated);

        return redirect()
            ->route('subscriber-types.edit', $subscriberType)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, SubscriberType $subscriberType): View
    {
        $this->authorize('view', $subscriberType);

        return view('app.subscriber_types.show', compact('subscriberType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, SubscriberType $subscriberType): View
    {
        $this->authorize('update', $subscriberType);

        return view('app.subscriber_types.edit', compact('subscriberType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        SubscriberTypeUpdateRequest $request,
        SubscriberType $subscriberType
    ): RedirectResponse {
        $this->authorize('update', $subscriberType);

        $validated = $request->validated();

        $subscriberType->update($validated);

        return redirect()
            ->route('subscriber-types.edit', $subscriberType)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        SubscriberType $subscriberType
    ): RedirectResponse {
        $this->authorize('delete', $subscriberType);

        $subscriberType->delete();

        return redirect()
            ->route('subscriber-types.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
