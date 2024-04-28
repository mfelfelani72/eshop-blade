<?php

namespace App\Models\Administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimarySlider extends Model
{
    use HasFactory;

    protected $table = 'primary_slider';

    protected $fillable = [
        'img',
        'title',
        'slogan',
        'category',
        'link_title',
        'link',
        'description',
        'extra',
        'status',
    ];
}
