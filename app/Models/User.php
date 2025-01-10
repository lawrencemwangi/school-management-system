<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

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


    // The relationship between the models
    public function parent()
    {
        return $this->belongsTo(Parent::class);
    }

    public function attendance() 
    {
        return $this->hasMany(Attendance::class);
    }

    public function discipline() 
    {
        return $this->belongTo(Discipline::class);
    }


    protected $casts = [
        'last_seen' => 'datetime',
    ];


    //to check if the User is online or Offline
    public function getOnlineDetailsAttribute()
    {
        if ($this->last_seen) {
            if ($this->last_seen->diffInMinutes(Carbon::now()) < 3) {
                return ['status' => 'Online', 'class' => 'text_success'];
            }
            return [
                'status' => $this->last_seen->diffForHumans(),
                'class' => 'text_success'
            ];
        }
        return ['status' => 'Offline', 'class' => 'text_danger'];
    }

    //Accessing the user profile picture
    public function getImageUrl()
    {
        if($this->image && Storage::disk('public')->exists('users/' . $this->image)){
            return  Storage::url('users/' . $this->image);

        }else{
            return asset('assets/images/user.png');
        }
    }

    public function getProfileImageUrlAttribute()
    {
        return $this->image 
            ? asset('storage/users/' . $this->image) 
            : asset('assets/images/user.png'); 
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }
}
