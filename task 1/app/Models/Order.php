<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'address',
        'total_amount',
        'status', 
    ];

    // علاقة الطلب بالمستخدم (الطلب ينتمي لمستخدم)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // علاقة الطلب بالعناصر المشتراة (الطلب يحتوي على عدة منتجات)
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}