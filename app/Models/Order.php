<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected  $guarded = [];

    public  function customer(){

        return $this->belongsTo(User::class);
    }

    public  function processor(){ //who accept the or processed the customer order

        return $this->hasOne(User::class,'process_by ');
    }

    public  function products(){
        return $this->hasMany(OrderProducts::class);
    }
}
