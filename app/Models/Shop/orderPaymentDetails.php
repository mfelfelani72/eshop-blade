<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class orderPaymentDetails extends Model
{
    use HasFactory;

    protected $table = 'order_list_details';

    protected $fillable = [
        'user_id',
        'bank_code',
        'price_total',
        'price_total_tax',
        'details',
        'details_bank',
        'extra',
        'status'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
