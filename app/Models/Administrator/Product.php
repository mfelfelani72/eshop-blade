<?php

namespace App\Models\Administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'title',
        'code',
        'informations',
        'details',
        'description',
        'price',
        'price_off',
        'operator',
        'extra',
        'status',
    ];
}
