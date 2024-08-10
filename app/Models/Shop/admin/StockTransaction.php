<?php

namespace App\Models\Shop\admin;

use App\Models\Front\order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PHPUnit\Framework\Constraint\Operator;

class StockTransaction extends Model
{
    use HasFactory;

    protected $table = 'stock_transaction';

    protected $fillable = [
        'order_id',
        'product_id',
        'operator_id',
        'type',
        'count',
        'details',
        'extra',
        'status',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(order::class);
    }

    public function operator(): BelongsTo
    {
        return $this->belongsTo(Operator::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
