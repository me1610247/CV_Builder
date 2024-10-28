<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $guarded = []; 

    protected $fillable = [
        'user_id',
        'skill',
        'soft_skill',
    ];
}
