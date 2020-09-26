<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected  $guarded = [];


    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static ::creating(function ($category){

            $category->slug = Str::slug($category->name);
        });
    }


    public  function parents_category(){
       return $this->belongsTo(__CLASS__);
    }

    public  function  child_category(){
       return $this->hasMany(__CLASS__);
    }

    public  function  products(){
        return $this->hasMany(Product::class);
    }



    public function  subcategory(){

        return $this->hasMany(SubCategory::class);
    }
}
