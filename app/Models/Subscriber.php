<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscriber extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['status', 'email', 'subscriber_type_id'];

    protected $searchableFields = ['*'];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function subscriberType()
    {
        return $this->belongsTo(SubscriberType::class);
    }
}
