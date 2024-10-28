<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = []; 

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'start_date',
        'end_date',
        'link',
    ];
}
