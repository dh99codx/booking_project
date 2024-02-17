<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FamilyDetails extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'given_name',
        'middle_name',
        'family_name',
        'email_address',
        'contact_number',
        'dob',
        'relationship',
        'gothram',
        'rashi',
        'natchatram',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'family_details';

    protected $casts = [
        'dob' => 'date',
    ];
}
