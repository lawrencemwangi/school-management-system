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
        'user_level',
        'form_id',
        'subjects',
    ];

    protected $cast = [
        'fees_categories' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(Parents::class);
    }

    public function dorm()
    {
        return $this->belongsTo(Dorm::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
    
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
