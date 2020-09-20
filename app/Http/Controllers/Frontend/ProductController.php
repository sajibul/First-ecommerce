<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{



    public function showAllProduct(){
      $data['products']=Product::latest()->paginate(9);
      return view('Fontend.products.all-products',$data);
    }

    public  function  showProductDetails($id){
   $data['details'] = Product::findOrFail($id);
   $data['products']=Product::latest()->get();
      return view('Fontend.products.details',$data);
    }
}
