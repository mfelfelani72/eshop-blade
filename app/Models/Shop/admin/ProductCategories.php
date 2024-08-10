<?php

namespace App\Models\Shop\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductCategories extends Model
{
    use HasFactory;

    public function insertCategories($product_id, $categories)
    {


        $productCategories = ProductCategories::where('product_id', $product_id)->get();

        if ($productCategories)
            foreach ($productCategories as $item)
                $item->destroy($item->id);



        // for find old categories object
        $categoriesObject = Categories::select(
            'id',
            'title',
        )
            ->whereIn('title', $categories)->get()->toArray();

        // for find old categories object


        // for add new categories

        $oldCategoriesTitle = [];
        $oldCategoriesIds = [];
        $newCategoriesTitle = [];

        foreach ($categoriesObject as $object) {
            $oldCategoriesTitle[] = $object['title'];
            $oldCategoriesIds[] = $object['id'];
        }

        foreach ($categories as $item)

            if (!in_array($item, $oldCategoriesTitle))

                $newCategoriesTitle[] = $item;


        $categories = new Categories();
        $newCategoriesIds = $categories->insertCategories($newCategoriesTitle);

        // for add new categories

        $allCategories = array_merge($oldCategoriesIds, $newCategoriesIds);

        // save all product categories 

        $productCategories = [];

        foreach ($allCategories as $category) {
            $productCategories[] = [
                'product_id' => $product_id,
                'category_id' => $category,
            ];
        }
        $result = ProductCategories::insert($productCategories);
        // save all product categories 

        return $result;
    }
}
