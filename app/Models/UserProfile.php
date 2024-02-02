<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfile extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'profile_picture',
        'contact_number_landline',
        'gothram',
        'rashi',
        'natchatram',
        'user_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'user_profiles';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
