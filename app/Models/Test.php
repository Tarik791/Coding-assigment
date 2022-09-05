<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $table = 'tests';

    protected $fillable = [

        'courses_id',
        'title',
        'description',
        'image',
        'status',
        'created_by'

    ];

    public function courses(){

        return $this->belongsTo(Courses::class, 'courses_id','id');

    }


    public function user(){

        return $this->belongsTo(User::class, 'created_by', 'id');

    }
}
