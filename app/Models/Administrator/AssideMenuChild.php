<?php

namespace App\Models\Administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssideMenuChild extends Model
{
    use HasFactory;

    protected $table = 'asside_menu_child';

    protected $fillable = [
        'asside_menu_id',
        'title',
        'link',
        'code',
        'operator',
        'extra',
        'status',
    ];
}
