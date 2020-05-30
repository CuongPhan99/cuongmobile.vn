<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $table = 'mc_users';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
