<?php

namespace App\Models\Administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProductCategories extends Model
{
    use HasFactory;

    public function insertCategories($product_id, $categories)
    {

        $data = [];

        if (!empty($categories)) {
            foreach ($categories as $item) {

                $data[] =
                    [
                        'product_id' => $product_id,
                        'code' => 'empty',
                        'title' => $item,
                        'description' => 'empty',
                        'operator' => Auth::user()->id,
                        'extra' => 'empty',

                    ];
            }
        }

        return (ProductCategories::insert($data));
    }
}
