<?php

namespace App\Http\Controllers;

use App\Models\Frequency;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\FrequencyStoreRequest;
use App\Http\Requests\FrequencyUpdateRequest;

class FrequencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Frequency::class);

        $search = $request->get('search', '');

        $frequencies = Frequency::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.frequencies.index', compact('frequencies', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Frequency::class);

        return view('app.frequencies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FrequencyStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Frequency::class);

        $validated = $request->validated();

        $frequency = Frequency::create($validated);

        return redirect()
            ->route('frequencies.edit', $frequency)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Frequency $frequency): View
    {
        $this->authorize('view', $frequency);

        return view('app.frequencies.show', compact('frequency'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Frequency $frequency): View
    {
        $this->authorize('update', $frequency);

        return view('app.frequencies.edit', compact('frequency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        FrequencyUpdateRequest $request,
        Frequency $frequency
    ): RedirectResponse {
        $this->authorize('update', $frequency);

        $validated = $request->validated();

        $frequency->update($validated);

        return redirect()
            ->route('frequencies.edit', $frequency)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Frequency $frequency
    ): RedirectResponse {
        $this->authorize('delete', $frequency);

        $frequency->delete();

        return redirect()
            ->route('frequencies.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
