<?php

namespace App\Models\Administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Categories extends Model
{
    use HasFactory;

    public function insertCategories($categories)
    {

        $data = [];

        if (!empty($categories)) {
            foreach ($categories as $item) {

                $data[] =
                    [
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
