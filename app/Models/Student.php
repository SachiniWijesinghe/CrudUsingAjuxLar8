<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table ='students'; //meka gnne migration eke tyena table name eken

    protected $fillable =[
        'name',
        'caurse',
        'email',
        'phone',
    ];
}
