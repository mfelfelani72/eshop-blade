<?php

namespace App\Models\Administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderMenuChild extends Model
{
    use HasFactory;

    protected $table = 'header_menu_child';

    protected $fillable = [
        'header_menu_id',
        'title',
        'code',
        'image',
        'operator',
        'extra',
        'status',
    ];
}
