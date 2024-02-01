<?php

namespace App\Http\Controllers;

use App\Mail\SendSubscribeEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use App\Models\Frequency;
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
        $frequencies = Frequency::pluck('name', 'id');

        $token = hash('sha256', time());


        return view(
            'app.subscribers.create',
            compact('subscriberTypes', 'frequencies','token')
        );
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
        $frequencies = Frequency::pluck('name', 'id');

        return view(
            'app.subscribers.edit',
            compact('subscriber', 'subscriberTypes', 'frequencies')
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


//    public function test_subscriber(Request $request)
//    {
//
//        $token = hash('sha256', time());
//
//        $subscriber = new Subscriber();
//
//        $subscriber->token = $token;
//        $subscriber->status = 1;
//        $subscriber->email = 'sokfofo@gmail.com';
//        $subscriber->subscriber_type_id = 3;
//        $subscriber->frequency_id = 2;
//
//        $subscriber->save();
//
//
//        dd('success fully updated');
//
//    }
//
//    public function test_subscriber_form(Request $request)
//    {
//        return view('app.test_form.test_form');
//    }



    public function customer_subscriber(Request $request)
    {

        $subscriberTypes = SubscriberType::pluck('name', 'id');
        $frequencies = Frequency::pluck('name', 'id');

        $token = hash('sha256', time());


        return view(
            'app.customer_subscribe.create',
            compact('subscriberTypes', 'frequencies','token')
        );

    }

    public function customer_subscriber_store(Request $request)
    {

        $email = Auth::user()->email;

        $token = hash('sha256', time());

        $request->validate([
            'subscriber_type_id'=>'required',
            'frequency_id'=>'required'
        ]);

        $form_data=array(
            'token'=>$token,
            'email'=>$email,
            'subscriber_type_id'=>$request->subscriber_type_id,
            'frequency_id'=>$request->frequency_id,
        );


        Subscriber::create($form_data);


        $data = array(
            'token'=>$token,
            'email'=>$email,
        );

        Mail::to('john@testing.net')->send(new SendSubscribeEmail($data));


    }

    public function verify_token(Request $request)
    {

       $token = request()->segment(2);
       $email = request()->segment(3);


       $subscribers = DB::table('subscribers')->where([
           ['token', '=', $token],
           ['email', '=', $email],
       ])->first();

       $form_data = array(
           'status'=>1,
       );

       Subscriber::whereId($subscribers->id)->update($form_data);

       return redirect()->route('customer_subscriber')->with('success','Subscribe success');

    }


}
