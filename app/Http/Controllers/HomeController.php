<?php

namespace App\Http\Controllers;

use App\Mail\SendMailable;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->user()->markEmailAsVerified()) {
            if (auth()->user()->success_msg == 0)
            {
                $form_data= array(
                    'success_msg'=>1,
                );
                User::whereId(auth()->user()->id)->update($form_data);
                Mail::to('web-tutorial@programmer.net')->send(new SendMailable());
            }
        }
        $users = User::pluck('given_name', 'id');
        $userProfile = UserProfile::find(auth()->user()->id);
        return view('home',compact('userProfile', 'users'));
    }
}
