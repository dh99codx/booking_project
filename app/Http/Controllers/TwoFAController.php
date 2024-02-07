<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TwoFAController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        auth()->user()->generateCode();
        return view('2fa');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'=>'required',
        ]);

        $find = UserCode::where('user_id', auth()->user()->id)
            ->where('code', $request->code)
            ->where('updated_at', '>=', now()->subMinutes(2))
            ->first();

        if (!is_null($find)) {
            Session::put('user_2fa', auth()->user()->id);

            $form_data= array(
                'mobile_number'=>session()->get('new_phone_number'),
            );

            User::whereId(auth()->user()->id)->update($form_data);
            session()->forget('new_phone_number');

            return redirect()->route('home')->with('success','updated your phone number');
        }

        return back()->with('error', 'You entered wrong code.');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function resend()
    {
        auth()->user()->generateCode();

        return back()->with('success', 'We sent you code on your mobile number.');
    }

    public function mobile_number_reset(Request $request)
    {

        $request->session()->put('new_phone_number',$request->mobile_number_reset);


        $mobile_number = auth()->user()->mobile_number;

        if ($mobile_number != $request->mobile_number_reset)
        {

            auth()->user()->generateCode();
            return redirect()->route('2fa.index');
        }

        return back()->with('success', 'Change your mobile number and try again');
    }

}
