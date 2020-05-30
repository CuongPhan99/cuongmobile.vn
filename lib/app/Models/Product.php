<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'mc_products';
    protected $primaryKey = 'prod_id';
    protected $guarded = [];
}
