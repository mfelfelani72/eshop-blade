<?php

namespace App\Models\Administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductTrend extends Model
{
    use HasFactory;

    protected $table = 'product_trend';

    protected $fillable = [
        'product_id',
        'code',
        'description',
        'operator',
        'extra',
        'status',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
