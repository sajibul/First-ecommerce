<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerLoginController extends Controller
{
  public function showLogin(){
    return view('Fontend.customerAuth.login');
  }
}
