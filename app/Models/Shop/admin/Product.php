<?php

namespace App\Models\Shop\admin;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends BaseModel
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

    public function getInformations(){
        
        $informations =(array) json_decode($this->informations, true);
        
        return $informations;
    }

    public function coverImage(): HasOne
    {
        return $this->hasOne(ProductImages::class)->where('product_id', $this->id);
    }

    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImages::class)->where('product_id', $this->id);
    }

    public function stock(): HasOne
    {
        return $this->hasOne(Stock::class)->where('product_id', $this->id);
    }

}
