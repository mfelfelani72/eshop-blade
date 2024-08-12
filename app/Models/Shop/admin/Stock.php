<?php

namespace App\Models\Shop\admin;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stock extends BaseModel
{
    use HasFactory;

    const TYPE_INCREASE = 'increase';
    const TYPE_DECREASE = 'decrease';

    protected $table = 'stock';

    protected $fillable = [
        'product_id',
        'count',
        'extra',
        'status',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    static function calculate(string $id)
    {

        $increase = StockTransaction::where('product_id', $id)->where('type', Stock::TYPE_INCREASE)->sum('count');
        $decrease = StockTransaction::where('product_id', $id)->where('type', Stock::TYPE_DECREASE)->sum('count');
        return $increase - $decrease;
    }
}
