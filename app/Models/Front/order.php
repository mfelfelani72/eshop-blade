<?php

namespace App\Models\Front;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class order extends Model
{
    use HasFactory;

    protected $table = 'order_list';

    protected $fillable = [
        'user_id',
        'operator_id',
        'type_send',
        'extra',
        'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function operator(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(OrderList::class)->where('product_id', $this->id);
    }

    public function orderPayment(): HasOne
    {
        return $this->hasOne(OrderPaymentDetails::class)->where('order_id', $this->id);
    }
}
