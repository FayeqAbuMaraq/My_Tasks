<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'patient_name',
        'patient_gender',
        'age',
        'teeth_numbers',
        'shade',
        'instructions',
        'status',
        'due_date',
        'total_price',
    ];

    protected $casts = [
        'teeth_numbers' => 'array',
        'due_date' => 'date',
        'total_price' => 'decimal:2',
    ];

    public function setTeethNumbersAttribute($value)
    {
        $this->attributes['teeth_numbers'] = is_array($value) ? json_encode($value) : $value;
    }

    public function getTeethNumbersAttribute($value)
    {
        return json_decode($value, true);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function service()
    {
        return $this->belongsTo(Service::class);
    }


    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}