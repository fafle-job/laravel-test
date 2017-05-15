<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = ['title', 'user', 'description', 'status', 'close_date'];
    protected $hidden = ['user_id'];
}
