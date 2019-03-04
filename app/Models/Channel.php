<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    //
    protected $fillable = [
       'pid', 'title', 'description', 'sort',
    ];
}
