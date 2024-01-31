<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Frequency extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'days'];

    protected $searchableFields = ['*'];

    public function subscribers()
    {
        return $this->hasMany(Subscriber::class);
    }
}
