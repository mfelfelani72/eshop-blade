<?php

namespace App\Models\Front;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    static function addresses()
    {

        return UserProfileAddress::where("user_id", Auth::user()->id)->get();
    }
}
