<?php

namespace App\Models\Administrator;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Categories extends BaseModel
{
    use HasFactory;

  

    protected $fillable = [
        'title',
        'code',
        'description',
        'operator',
        'extra',
        'status',
    ];

    public function insertCategories($categories)
    {

        $data = [];
        $categoriesIds = [];

        if (!empty($categories)) {
            foreach ($categories as $item) {

                $data[] =
                    [
                        'code' => 'empty',
                        'title' => $item,
                        'description' => 'empty',
                        'operator' => Auth::user()->id,
                        'extra' => 'empty'

                    ];
            }
        }


        foreach ($data as $row)
            $categoriesIds[] = DB::table('categories')->insertGetId($row);



        return $categoriesIds;
    }

    
}
