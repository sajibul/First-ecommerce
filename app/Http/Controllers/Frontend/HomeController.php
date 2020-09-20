<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    public function showHomePage(){

        $products['productInfo']=Product::where('active','1')->take(9)->get();
        return view('Fontend.fontend',$products);
    }
}
