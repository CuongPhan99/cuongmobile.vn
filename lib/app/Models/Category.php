<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'mc_categories';
    protected $primaryKey = 'cate_id';
    protected $guarded = [];
}
