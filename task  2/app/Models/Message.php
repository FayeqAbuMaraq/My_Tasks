<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
        use HasFactory;

    protected $fillable = [
        'order_id',   
        'user_id',    
        'message',    
        'attachment', 
        'is_read',   
    ];

    protected $attributes = [
        'is_read' => false,
    ];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
