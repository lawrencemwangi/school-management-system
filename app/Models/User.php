<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'address',
        'phone_number',
        'other_phone',
        'gender',
        'user_level',
        'status',
        'last_seen',
        'image',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getUserLevelLabelAttribute()
    {
        $levels = [
            0 => 'super admin',
            1 => 'Admin',
            2 => 'Teacher',
            3 => 'Accountant',
            4 => 'Student',
            5 => 'Parent',
        ];

        return $levels[$this->user_level] ?? 'Unkown';
    }


    public function parent()
    {
        return $this->belongsTo(Parent::class);
    }

    public function attendance() {
        return $this->hasMany(Attendance::class);
    }
}
