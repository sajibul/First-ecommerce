<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Cart;
class CartController extends Controller
{


    public function insertCart(Request $request){
      // print_r($_POST);
        $id=$request->id;

        $product = Product::where('id',$id)->first();

          $data=array();

          if($product->sale_price!=null && $product->sale_price > 0){
            $data['id']=$product->id;
            $data['name']=$product->title;
            $data['qty']=$request->qty;
            $data['price']=$product->sale_price;
            $data['weight']=333;
            $data['options']['description']=$product->description;
         }else{
           $data['id']=$product->id;
           $data['name']=$product->title;
           $data['qty']=$request->qty;
           $data['price']=$product->price;
           $data['weight']=333;
           $data['options']['description']=$product->description;
          }

         $cart =  Cart::add($data);
         return redirect()->route('show-card');
    }



    public  function showCart(){ //this for checkout
       $content['content']= Cart::content();
      return view('Fontend.products.cart',$content);
    }

    public function deleteCart($rowId){
        Cart::update($rowId , 0);
        return redirect()->route('show-card');
    }


    public  function  cartUpdate(Request  $request){
        $qty=$request->qty;
        $rowId=$request->rowId;
        Cart::update($rowId,$qty);
        return redirect()->route('show-card');
    }

    // public function checkout(){
    //   $content= Cart::content();
    //   return response()->json($content);
    // }






    public function addToCart($id){
      // print_r($_POST);
        // $id=$request->id;

        // $product = Product::where('id',$id)->first();
        //
        //   $data=array();
        //
        //   if($product->sale_price!=null && $product->sale_price > 0){
        //     $data['id']=$product->id;
        //     $data['name']=$product->title;
        //     $data['qty']=1;
        //     $data['price']=$product->sale_price;
        //     $data['weight']=333;
        //     $data['options']['description']=$product->description;
        //  }else{
        //    $data['id']=$product->id;
        //    $data['name']=$product->title;
        //    $data['qty']=1;
        //    $data['price']=$product->price;
        //    $data['weight']=333;
        //    $data['options']['description']=$product->description;
        //   }
        //
        //  $cart =  Cart::add($data);
        //  return $cart;
        // return\Response::json(['success'=>'Successfully  Added on your cart',$cart->qty]);
    }



}
