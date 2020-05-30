<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'mc_order';
    protected $primaryKey = 'or_id';
    protected $guarded = [];

    const STATUS_DONE = 1;
    const STATUS_DEFAULT = 0;
}
