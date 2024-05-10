<?php

namespace App\Models\Administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;

    public function insertImages($product_id, $images)
    {

        $data = [];
        $img = "";
        $count = 0;

        $productImages = ProductImages::where('product_id', $product_id)->get();

        if ($productImages) {

            foreach ($productImages as $item) {

                if (file_exists('front/img/products/' . $item->img)) {
                    unlink('front/img/products/' . $item->img);
                    $item->destroy($item->id);

                }

            }

        }

        if (!empty($images)) {
            foreach ($images as $item) {

                $img = time() . $count++ . "." . $item->getClientOriginalExtension();
                $data[] =
                    [
                        'product_id' => $product_id,
                        'description' => 'empty',
                        'extra' => 'empty',
                        'img' => $img,
                    ];

                $item->move('front/img/products', $img);
            }
        }

        return (ProductImages::insert($data));
    }
}
