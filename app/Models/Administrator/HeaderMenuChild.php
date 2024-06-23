<?php

namespace App\Models\Administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function grandChilds(): HasMany
    {
        return $this->hasMany(HeaderMenuGrandchild::class)->where('Header_menu_child_id', $this->id);
    }
}
