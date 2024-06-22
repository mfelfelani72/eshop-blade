<?php

namespace App\Models\Administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HeaderMenu extends Model
{
    use HasFactory;

    protected $table = 'header_menu';

    protected $fillable = [
        'title',
        'code',
        'link',
        'lable',
        'operator',
        'extra',
        'status',
    ];

    public function child(): HasOne
    {
        return $this->hasOne(HeaderMenuChild::class)->where('header_menu_id', $this->id);
    }
}
