<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'Check_In',
        'Check_Out',
        'Booking_Reference_No',
        'Customer_Given_Name',
        'Customer_Family_Name',
        'Customer_Contact_Number',
        'Customer_Email_Address',
        'Total_Payment',
        'Deposit_Made',
        'Balance_Amount',
        'Balance_Amount_Due',
        'user_id',
        'hall_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'Check_In' => 'datetime',
        'Check_Out' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
}
