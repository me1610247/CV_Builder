<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $guarded = []; 

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'date',
        'company',
    ];
}
