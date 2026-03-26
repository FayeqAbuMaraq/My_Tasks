<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
    ];

    // علاقة القسم بالمنتجات (القسم الواحد يحتوي على عدة منتجات)
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
