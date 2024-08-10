<?php

namespace App\Models\Front;

use App\Models\Administrator\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class orderList extends Model
{
    use HasFactory;

    protected $table = 'order_list';

    protected $fillable = [
        'order_id',
        'product_id',
        'address_id',
        'count',
        'price_final',
        'extra',
        'status'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function address(): BelongsTo
    {
        return $this->belongsTo(UserProfileAddress::class);
    }
}
