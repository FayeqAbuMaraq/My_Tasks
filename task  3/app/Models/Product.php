<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
protected $fillable = [
'name', 
    'slug', 
    'category_id', 
    'price', 
    'sale_price',    
    'quantity',     
    'image', 
    'is_featured', 
    'description', 
    'short_description'
];

    public function Category(){
        return $this-> belongsTo(Category::class);
    }
    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}
