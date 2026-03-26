<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'email',
        'content',
        'avatar_color',
        'is_faq',
        'answer',
    ];
}
