<?php

use Illuminate\Support\Facades\Route;

//admin controllers
Auth::routes();

  Route::get('/home', 'HomeController@index')->name('home');

  Route::group(['prefix'=>'backend','namespace'=>'Backend','middleware'=>['auth']],function(){
// category routes   
  Route::resource('category','CategoryController');
  Route::get('category/{id}/delete','CategoryController@delete')->name('category.destroy');
  Route::get('allCategory','CategoryController@allCategory')->name('allcategory');
//category published
  Route::get('category-published','CategoryController@published')->name('category-published');
  //category unpublished
  Route::get('category-unpublished','CategoryController@unpublished')->name('category-unpublished');
  //pagination
  Route::get('category-pagination','CategoryController@pagination')->name('category-pagination');
  //search category
  Route::get('search-category','CategoryController@search')->name('category-search');
  
  // subCategory route 
  Route::resource('subcategory','SubCategoryController');
  Route::get('subcategory.destroy/{id}','SubCategoryController@delete')->name('subcategory.destroy');
  Route::get('allsubcategory','SubCategoryController@allsubcategory')->name('allsubcategory');
  
  //subcategory published
  Route::get('subcategory-published','SubCategoryController@published')->name('subcategory-published');
  //subcategory unpublished
  Route::get('subcategory-unpublished','SubCategoryController@unpublished')->name('subcategory-unpublished');



  //Brand controller 
  Route::resource('brand','BrandController');
  Route::get('all-brand','BrandController@allData')->name('allBrand');
  Route::get('brand/destroy/{id}','BrandController@delete')->name('brand.destroy');
  //subcategory published
  Route::get('brand-published','BrandController@published')->name('brand-published');
  //subcategory unpublished
  Route::get('brand-unpublished','BrandController@unpublished')->name('brand-unpublished');
  Route::get('brand-published','BrandController@published')->name('brand-published');


  });




//frontend routes

Route::group(['namespace'=>'Frontend'],function (){
    Route::get('/','HomeController@showHomePage')->name('frontend.home');
    //product controller
    Route::get('products/all','ProductController@showAllProduct')->name('all.products');
    Route::get('products/details/{id}','ProductController@showProductDetails')->name('product.details');

   //cartController
    Route::get('add/to/cart/{id}','CartController@addToCart');//ajax addToCart
    Route::get('check','CartController@checkout');//ajax show data in cart chekout
    //shopping cart
    Route::post('add-to-cart','CartController@insertCart')->name('cart.insert');
    Route::get('show-card','CartController@showCart')->name('show-card');
    Route::get('delete-to-cart/{rowId}','CartController@deleteCart')->name('delete-card');
    Route::post('update-cart','CartController@cartUpdate')->name('update-cart');


    //checkout controller
    Route::get('checkout/show','CheckoutController@showCheckout')->name('checkout.show');
    //login and registration
    Route::get('login/show','CustomerLoginController@showLogin')->name('login.show');
});
