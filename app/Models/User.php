<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Scopes\Searchable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Exception;
use Twilio\Rest\Client;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasRoles;
    use Notifiable;
    use HasFactory;
    use Searchable;
    use HasApiTokens;
    use SoftDeletes;

    protected $fillable = [
        'given_name',
        'middle_name',
        'family_name',
        'dob',
        'address',
        'mobile_number',
        'email',
        'password',
        'news_letter_subscription',
        'privacy_policy_and_terms_of_condition',
    ];

    protected $searchableFields = ['*'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'dob' => 'date',
        'email_verified_at' => 'datetime',
        'news_letter_subscription' => 'boolean',
        'privacy_policy_and_terms_of_condition' => 'boolean',
    ];

    public function userProfiles()
    {
        return $this->hasMany(UserProfile::class);
    }

    public function isSuperAdmin(): bool
    {
        return $this->hasRole('super-admin');
    }


    public function generateCode()
    {
        $code = rand(1000, 9999);

       // dd(session()->get('new_phone_number'));

        UserCode::updateOrCreate(
            [ 'user_id' => auth()->user()->id ],
            [ 'code' => $code ]
        );

        $receiverNumber = session()->get('new_phone_number');
        $message = "2FA login code is ". $code;

        try {

            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_number = getenv("TWILIO_PHONE_NUMBER");

            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number,
                'body' => $message]);

           // dd($twilio_number,$message);

        } catch (Exception $e) {
            info("Error: ". $e->getMessage());
        }
    }



}
