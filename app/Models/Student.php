<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'parent_id',
        'dorm_id',
        'class_id',
        'dob',
        'year_admitted',
        'graduation_date',
        'registration_number',
        'graduation_status',
        'user_level'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
