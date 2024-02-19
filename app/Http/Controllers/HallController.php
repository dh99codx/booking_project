<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\HallStoreRequest;
use App\Http\Requests\HallUpdateRequest;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Hall::class);

        $search = $request->get('search', '');

        $halls = Hall::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.halls.index', compact('halls', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Hall::class);

        return view('app.halls.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HallStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Hall::class);

        $validated = $request->validated();

        $hall = Hall::create($validated);

        return redirect()
            ->route('halls.edit', $hall)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Hall $hall): View
    {
        $this->authorize('view', $hall);

        return view('app.halls.show', compact('hall'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Hall $hall): View
    {
        $this->authorize('update', $hall);

        return view('app.halls.edit', compact('hall'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        HallUpdateRequest $request,
        Hall $hall
    ): RedirectResponse {
        $this->authorize('update', $hall);

        $validated = $request->validated();

        $hall->update($validated);

        return redirect()
            ->route('halls.edit', $hall)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Hall $hall): RedirectResponse
    {
        $this->authorize('delete', $hall);

        $hall->delete();

        return redirect()
            ->route('halls.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
