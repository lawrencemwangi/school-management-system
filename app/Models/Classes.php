<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'class_name', 
        'class_capacity',
        'form_id'
    ];


    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
