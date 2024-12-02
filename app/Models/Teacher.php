<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'emp_code',
        'emp_date',
        'user_level',
        'subjects',
        'class_id',
        'status',
    ];

    protected $cast = [
        'subjects' => 'array',
    ];

    public function user()
    {
        return $this->BelongsTo(User::class);
    }

    public function subject()
    {
        return $this->BelongsTo(Subject::class);
    }
}
