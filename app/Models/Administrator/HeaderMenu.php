<?php

namespace App\Models\Administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'code',
        'link',
        'lable',
        'operator',
        'extra',
        'status',
    ];
}
