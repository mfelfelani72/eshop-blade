<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfileAddress extends Model
{
    use HasFactory;

    protected $table = 'user_profile_address';

    protected $fillable = [
        'user_id',
        'country',
        'province',
        'city',
        'street',
        'avenue',
        'home_number',
        'zip_code',
        'floor',
        'unit',
        'location',
        'extra',
        'status',
    ];
}
