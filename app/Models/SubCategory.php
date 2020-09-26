<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'category_id','subcategory_name','description',
    ];


   

    public  function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
     }
}
