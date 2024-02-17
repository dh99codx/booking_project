<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\FamilyDetails;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\FamilyDetailsStoreRequest;
use App\Http\Requests\FamilyDetailsUpdateRequest;

class FamilyDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', FamilyDetails::class);

        $search = $request->get('search', '');

        $allFamilyDetails = FamilyDetails::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.all_family_details.index',
            compact('allFamilyDetails', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', FamilyDetails::class);

        return view('app.all_family_details.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FamilyDetailsStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', FamilyDetails::class);

        $validated = $request->validated();

        $familyDetails = FamilyDetails::create($validated);

        return redirect()
            ->route('all-family-details.edit', $familyDetails)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, FamilyDetails $familyDetails): View
    {
        $this->authorize('view', $familyDetails);

        return view('app.all_family_details.show', compact('familyDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, FamilyDetails $familyDetails): View
    {
        $this->authorize('update', $familyDetails);

        return view('app.all_family_details.edit', compact('familyDetails'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        FamilyDetailsUpdateRequest $request,
        FamilyDetails $familyDetails
    ): RedirectResponse {
        $this->authorize('update', $familyDetails);

        $validated = $request->validated();

        $familyDetails->update($validated);

        return redirect()
            ->route('all-family-details.edit', $familyDetails)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        FamilyDetails $familyDetails
    ): RedirectResponse {
        $this->authorize('delete', $familyDetails);

        $familyDetails->delete();

        return redirect()
            ->route('all-family-details.index')
            ->withSuccess(__('crud.common.removed'));
    }


    public function create_family_details(Request $request)
    {
        $user = Auth::user()->id;
        $familyDetails = FamilyDetails::where('user_id',$user)->exists();

         if ($familyDetails)
         {
             $familyDetails = FamilyDetails::where('user_id',$user)->first();

             return view('app.family_details_customer.edit', compact('user','familyDetails'));

         }else
         {
             return view('app.family_details_customer.create', compact('user'));
         }


    }

    public function create_family_details_store(Request $request)
    {

        $request->validate([
            'user_id'=>'required',
            'given_name'=>['required', 'max:255','min:3','string'],
            'middle_name' =>['required', 'max:255','min:3','string'],
            'family_name' => ['required', 'max:255','min:3','string'],
            'email_address' =>['required', 'unique:users,email', 'email:rfc,dns'],
            'contact_number' =>['required'],
            'dob' =>['required', 'date'],
            'relationship' =>['nullable', 'max:255','min:3','string'],
            'gothram' =>['nullable', 'max:255', 'string','min:3'],
            'rashi' =>['nullable', 'max:255', 'string','min:3'],
            'natchatram' =>['nullable', 'max:255', 'string','min:3'],
        ]);


        $form_data= array(
            'user_id'=>$request->user_id,
            'given_name'=>$request->given_name,
            'middle_name'  =>$request->middle_name,
            'family_name'  =>$request->family_name,
            'email_address'  =>$request->email_address,
            'contact_number'  =>$request->contact_number,
            'dob'  =>$request->dob,
            'relationship'  =>$request->relationship,
            'gothram'  =>$request->gothram,
            'rashi'  =>$request->rashi,
            'natchatram'  =>$request->natchatram,
        );


        FamilyDetails::create($form_data);

        return redirect()
            ->route('family_details_customer')
            ->withSuccess(__('crud.common.created'));
    }

}
