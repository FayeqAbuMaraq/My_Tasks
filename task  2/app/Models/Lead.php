<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'clinic_name', 'role'
    ];
}