<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feestructure extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_form',
        'term',
        'academic_year',
        'fees_categories',
    ];

    protected $cast = [
       'fees_categories' => 'array',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}

