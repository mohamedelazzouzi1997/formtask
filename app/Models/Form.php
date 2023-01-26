<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'dateOfBirth',
        'phone',
        'country',
        'city',
        'referal',
        'is_confirmed',
        'sales',
        'created_at'
    ];
}
