<?php

namespace App\Models\Administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductCategories extends Model
{
    use HasFactory;

    public function insertCategories($product_id, $categories)
    {

        // for find old categories object
        $categoriesObject = Categories::select(
            'id',
            'title',
        )
            ->whereIn('title', $categories)->get()->toArray();

        // for find old categories object

        
        // for add new categories
        $oldCategories = [];
        $newCategories = [];

        foreach ($categoriesObject as $object)
            $oldCategories[] = $object['title'];

        foreach ($categories as $item)

            if (!in_array($item, $oldCategories))

                $newCategories[] = $item;


        // for add new categories

        dd($newCategories);
    }
}
