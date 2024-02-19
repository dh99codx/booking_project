<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hall extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['Name', 'Price'];

    protected $searchableFields = ['*'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
