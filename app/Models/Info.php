<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Info extends Model
{
    use HasFactory;
    protected $guarded = []; 

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
        'phone',
        'address',
        'city',
        'country',
        'github',
        'linkedin',
    ];
}
