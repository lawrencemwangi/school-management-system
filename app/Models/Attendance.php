<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id',
        'date',
        'attendance',
        'total_students',
        'total_present',
        'total_absent',
        // 'total_late',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function student ()
    {
        return $this->belongsTo(Student::class);
    }

    public function records()
    {
        return $this->hasMany(AttendanceRecord::class, 'attendance_id');
    }

    public function class ()
    {
        return $this->belongsTo(Classes::class);
    }
}


