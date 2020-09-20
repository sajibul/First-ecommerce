<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    protected  $guarded = [];

    public $timestamps = false;

    public  function  order(){
        return $this->belongsTo(Order::class);
    }

    public  function  product(){
        return $this->belongsTo(Product::class);
    }
}
