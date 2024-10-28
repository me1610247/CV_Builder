<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $guarded = []; 

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'start_date',
        'end_date',
        'company',
    ];
}
