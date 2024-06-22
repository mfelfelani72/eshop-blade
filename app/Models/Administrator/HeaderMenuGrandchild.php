<?php

namespace App\Models\Administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderMenuGrandchild extends Model
{
    use HasFactory;

    protected $table = 'header_menu_grandChild';

    protected $fillable = [
        'header_menu_child_id',
        'title',
        'code',
        'link',
        'operator',
        'extra',
        'status',
    ];
}
