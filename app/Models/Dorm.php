<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dorm extends Model
{
    use HasFactory;

    protected $fillable = [
        'dorm_name',
        'dorm_capacity',
    ];
}
