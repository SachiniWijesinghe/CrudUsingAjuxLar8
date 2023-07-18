<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caurse extends Model
{
    use HasFactory;



    protected $table ='caurses'; //meka gnne migration eke tyena table name eken

    protected $fillable =[
        'name',
        'no_of_modules',
        'time_period',
        'price',
    ];
}
