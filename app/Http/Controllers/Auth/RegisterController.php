<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'given_name' => ['required', 'string', 'max:255','min:3'],
            'middle_name' => ['required', 'string', 'max:255','min:3'],
            'family_name' => ['required', 'string', 'max:255','min:3'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dob' => ['required', 'date'],
            'address' => ['required', 'max:255', 'string','min:3'],
            'mobile_number' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $news_letter_subscription = isset($data['news_letter_subscription']);
        $privacy_policy_and_terms_of_condition = isset($data['privacy_policy_and_terms_of_condition']);

        if ($news_letter_subscription && $privacy_policy_and_terms_of_condition){
            return User::create([
                'given_name' => $data['given_name'],
                'middle_name' => $data['middle_name'],
                'family_name' => $data['family_name'],
                'email' => $data['email'],
                'dob' => ($data['dob']),
                'address' => $data['address'],
                'mobile_number' => $data['mobile_number'],
                'news_letter_subscription' => $news_letter_subscription,
                'privacy_policy_and_terms_of_condition' => $privacy_policy_and_terms_of_condition,
                'password' => Hash::make($data['password']),
            ]);
        } elseif ($news_letter_subscription)
        {
            return User::create([
                'given_name' => $data['given_name'],
                'middle_name' => $data['middle_name'],
                'family_name' => $data['family_name'],
                'email' => $data['email'],
                'dob' => ($data['dob']),
                'address' => $data['address'],
                'mobile_number' => $data['mobile_number'],
                'news_letter_subscription' => $news_letter_subscription,
                'password' => Hash::make($data['password']),
            ]);
        } elseif ($privacy_policy_and_terms_of_condition)
        {
            return User::create([
                'given_name' => $data['given_name'],
                'middle_name' => $data['middle_name'],
                'family_name' => $data['family_name'],
                'email' => $data['email'],
                'dob' => ($data['dob']),
                'address' => $data['address'],
                'mobile_number' => $data['mobile_number'],
                'news_letter_subscription' => $privacy_policy_and_terms_of_condition,
                'password' => Hash::make($data['password']),
            ]);

        } else {
            return User::create([
                'given_name' => $data['given_name'],
                'middle_name' => $data['middle_name'],
                'family_name' => $data['family_name'],
                'email' => $data['email'],
                'dob' => ($data['dob']),
                'address' => $data['address'],
                'mobile_number' => $data['mobile_number'],
                'password' => Hash::make($data['password']),
            ]);
        }
    }

}
