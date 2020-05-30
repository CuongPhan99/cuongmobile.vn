<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $table = 'mc_orderdetail';
    protected $guarded = [];
    public function Order(){
        return $this->belongsTo('App\Models\Order','od_id','or_id');
    }
    public function Product(){
        return $this->belongsTo('App\Models\Product','prod_id','or_id');
    }
}
