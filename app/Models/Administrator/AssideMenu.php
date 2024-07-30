<?php

namespace App\Models\Administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssideMenu extends Model
{
    use HasFactory;

    protected $table = 'asside_menu';

    protected $fillable = [
        'title',
        'code',
        'link',
        'icon',
        'priority',
        'image',
        'operator',
        'extra',
        'status',
    ];
}
