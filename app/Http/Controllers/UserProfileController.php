<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfileStoreDashboardRequest;
use App\Http\Requests\UserProfileUpdateDashboardRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserProfileStoreRequest;
use App\Http\Requests\UserProfileUpdateRequest;
use App\Rules\PhoneNumberRule;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', UserProfile::class);

        $search = $request->get('search', '');

        $userProfiles = UserProfile::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.user_profiles.index',
            compact('userProfiles', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', UserProfile::class);

        $users = User::pluck('given_name', 'id');

        return view('app.user_profiles.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserProfileStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', UserProfile::class);

        $validated = $request->validated();
        if ($request->hasFile('profile_picture')) {
            $validated['profile_picture'] = $request
                ->file('profile_picture')
                ->store('public');
        }

        $userProfile = UserProfile::create($validated);

        return redirect()
            ->route('user-profiles.edit', $userProfile)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, UserProfile $userProfile): View
    {
        $this->authorize('view', $userProfile);

        return view('app.user_profiles.show', compact('userProfile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, UserProfile $userProfile): View
    {
        $this->authorize('update', $userProfile);

        $users = User::pluck('given_name', 'id');

        return view('app.user_profiles.edit', compact('userProfile', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UserProfileUpdateRequest $request,
        UserProfile $userProfile
    ): RedirectResponse {
        $this->authorize('update', $userProfile);

        $validated = $request->validated();
        if ($request->hasFile('profile_picture')) {
            if ($userProfile->profile_picture) {
                Storage::delete($userProfile->profile_picture);
            }

            $validated['profile_picture'] = $request
                ->file('profile_picture')
                ->store('public');
        }

        $userProfile->update($validated);

        return redirect()
            ->route('user-profiles.edit', $userProfile)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        UserProfile $userProfile
    ): RedirectResponse {
        $this->authorize('delete', $userProfile);

        if ($userProfile->profile_picture) {
            Storage::delete($userProfile->profile_picture);
        }

        $userProfile->delete();

        return redirect()
            ->route('user-profiles.index')
            ->withSuccess(__('crud.common.removed'));
    }

    /*update profile*/

    public function update_profile(
        UserProfileUpdateDashboardRequest $request, $id
    ): RedirectResponse {

        $userProfile = UserProfile::find($id);

        $validated = $request->validated();
        if ($request->hasFile('profile_picture')) {
            if ($userProfile->profile_picture) {
                Storage::delete($userProfile->profile_picture);
            }

            $validated['profile_picture'] = $request
                ->file('profile_picture')
                ->store('public');
        }

        $userProfile->update($validated);


        if ($request->password)
        {
            if ($request->password == $request->confirm_password)
            {
                $form_data= array(
                    'given_name'=>$request->given_name,
                    'middle_name'=>$request->middle_name,
                    'family_name'=>$request->family_name,
                    'address'=>$request->address,
                    'dob'=>$request->dob,
                    'mobile_number'=>$request->mobile_number,
                    'email'=>$request->email,
                    'password' =>  Hash::make($request->password),
                );
            }else{
                return redirect()
                    ->back()
                    ->withSuccess('Password Does not match');
            }
        }else {
            $form_data= array(
                'given_name'=>$request->given_name,
                'middle_name'=>$request->middle_name,
                'family_name'=>$request->family_name,
                'address'=>$request->address,
                'dob'=>$request->dob,
                'mobile_number'=>$request->mobile_number,
                'email'=>$request->email,
            );
        }


        User::whereId($userProfile->user_id)->update($form_data);


        return redirect()
            ->back()
            ->withSuccess(__('crud.common.saved'));

    }

    public function update_profile_store(Request $request,$id)
    {

       // dd($request);

        $usr = User::find($id);

        $request->validate([
            'given_name'=>'required|max:255|min:3|string',
            'middle_name'=>'nullable|max:255|min:3|string',
            'family_name'=>'required|max:255|min:3|string',
            'address'=>'required|max:255|min:3|string',
            'dob'=>'required|date',
            'profile_picture'=>'image|max:1024|nullable',
            'contact_number_landline'=>['nullable', new PhoneNumberRule],
        ]);

        if ($request->password){

            if ($request->password == $request->confirm_password)
            {


                $form_data=array(
                    'mobile_number'=>$usr->mobile_number,
                    'given_name'=>$request->given_name,
                    'middle_name'=>$request->middle_name,
                    'family_name'=>$request->family_name,
                    'address'=>$request->address,
                    'dob'=>$request->dob,
                    'password' =>  Hash::make($request->password),
                );


            }else{
                return redirect()
                    ->back()
                    ->withSuccess('Password Does not match');
            }

        }else{
            $form_data=array(
                'mobile_number'=>$usr->mobile_number,
                'given_name'=>$request->given_name,
                'middle_name'=>$request->middle_name,
                'family_name'=>$request->family_name,
                'address'=>$request->address,
                'dob'=>$request->dob,
            );
        }


        User::whereId($id)->update($form_data);


        if ($request->hasFile('profile_picture')) {
            $request->file('profile_picture')
                ->store('public');
        }

        $form_data=array(
            'contact_number_landline'=>$request->contact_number_landline,
            'gothram'=>$request->gothram,
            'rashi'=>$request->rashi,
            'natchatram'=>$request->natchatram,
            'user_id'=>$id,
            'profile_picture'=> $request->hasFile('profile_picture') ? $request->hasFile('profile_picture') : null
        );


        UserProfile::create($form_data);


        return redirect()
            ->back()
            ->withSuccess(__('crud.common.saved'));
    }


    public function activate_deactivate(Request $request, User $user): RedirectResponse
    {
        $user = User::find(Auth::user()->id);

        Auth::logout();

        if ($user->delete()) {

            return redirect()
                ->back()
                ->withSuccess(__('crud.common.saved'));
        }
    }
}
