<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{

    use HasFactory;
    
    protected $table = 'user_profile';

    protected $fillable = [
        'user_id',
        'name',
        'last_name',
        'mobile',
        'image',
        'cover',
        'email',
        'bio',
        'about',
        'extra',
        'status',
    ];
}
