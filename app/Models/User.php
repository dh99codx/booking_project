<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use App\Models\Scopes\Searchable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasRoles;
    use Notifiable;
    use HasFactory;
    use Searchable;
    use HasApiTokens;

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

    public function isSuperAdmin(): bool
    {
        return $this->hasRole('super-admin');
    }
}
