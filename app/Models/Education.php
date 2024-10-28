<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Education extends Model
{
    protected $guarded = []; 

    protected $fillable = [
        'user_id',
        'country',
        'university',
        'start_date',
        'end_date',
        'field',
    ];

}
