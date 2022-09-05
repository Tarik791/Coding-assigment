<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [

        'title',
        'description',
        'image',
        'status',
        'created_by'

    ];

    public function tests(){

        return $this->hasMany(Test::class, 'courses_id','id');

    }

    
}
