<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'short_description',
        'description',
        'price',
        'sale_price',
        'quantity',
        'image',
        'is_featured',
    ];

    // علاقة المنتج بالقسم (المنتج ينتمي لقسم واحد)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // علاقة المنتج بطلبات الشراء (المنتج يمكن أن يكون في عدة طلبات)
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
