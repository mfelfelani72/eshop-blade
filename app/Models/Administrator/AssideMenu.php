<?php

namespace App\Models\Administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function childs(): HasMany
    {
        return $this->hasMany(AssideMenuChild::class)->where('asside_menu_id', $this->id);
    }
}
