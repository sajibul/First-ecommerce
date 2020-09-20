@extends('Fontend.layouts.master')
@section('content')
<section id="cart_items">
  <div class="container">
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Shopping Cart</li>
      </ol>
    </div>
    <div class="table-responsive cart_info">
      <table class="table table-condensed">
        <thead>
          <tr class="cart_menu">
            <td class="image">Item</td>
            <td class="description"></td>
            <td class="price">Price</td>
            <td class="quantity">Quantity</td>
            <td class="total">Total</td>
            <td></td>
          </tr>
        </thead>
        <tbody>
        @php
          $total=0;
        @endphp
          @foreach($content as $data)
          <tr>
            <td class="cart_product">
              <a href=""><img src="{{asset('frontend')}}/images/cart/one.png" alt=""></a>
            </td>
            <td class="cart_description">
              <h4><a href="">{{$data->name}}</a></h4>
              <p>Web ID: 1089772</p>
            </td>
            <td class="cart_price">
              <p>BD {{$data->price}}</p>
            </td>
            <td class="cart_quantity">
              <div class="cart_quantity_button">
                <!-- <a class="cart_quantity_up" href=""> + </a> -->
                  <form action="{{url('update-cart')}}" method="post">
                      @csrf
                <input class="cart_quantity_input" type="text" name="qty" value="{{$data->qty}}" autocomplete="off" size="2">
                  <input type="hidden" name="rowId" value="{{$data->rowId}}">
                  <input type="submit" class="btn btn-sm btn-default">
                  <!-- <a class="cart_quantity_down" href=""> - </a> -->
                  </form>
              </div>
            </td>
            <td class="cart_total">
              <p class="cart_total_price">{{$data->subtotal}} TK</p>
            </td>
            <td class="cart_delete">
              <a class="cart_quantity_delete" href="{{ url('delete-to-cart/'.$data->rowId)}}"><i class="fa fa-times"></i></a>
            </td>
          </tr>
          @php
          $total+=$data->subtotal;
          @endphp
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section> <!--/#cart_items-->

<section id="do_action">
  <div class="container">
    <div class="heading">
      <h3>What would you like to do next?</h3>
      <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="chose_area">
          <ul class="user_option">
            <li>
              <input type="checkbox">
              <label>Use Coupon Code</label>
            </li>
            <li>
              <input type="checkbox">
              <label>Use Gift Voucher</label>
            </li>
            <li>
              <input type="checkbox">
              <label>Estimate Shipping & Taxes</label>
            </li>
          </ul>
          <ul class="user_info">
            <li class="single_field">
              <label>Country:</label>
              <select>
                <option>United States</option>
                <option>Bangladesh</option>
                <option>UK</option>
                <option>India</option>
                <option>Pakistan</option>
                <option>Ucrane</option>
                <option>Canada</option>
                <option>Dubai</option>
              </select>

            </li>
            <li class="single_field">
              <label>Region / State:</label>
              <select>
                <option>Select</option>
                <option>Dhaka</option>
                <option>London</option>
                <option>Dillih</option>
                <option>Lahore</option>
                <option>Alaska</option>
                <option>Canada</option>
                <option>Dubai</option>
              </select>

            </li>
            <li class="single_field zip-field">
              <label>Zip Code:</label>
              <input type="text">
            </li>
          </ul>
          <a class="btn btn-default update" href="">Get Quotes</a>
          <a class="btn btn-default check_out" href="">Continue</a>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="total_area">
          <ul>
            <li>Cart Sub Total <span>{{Cart::subtotal()}} TK</span></li>
            <li>Eco Tax <span>{{Cart::tax()}} TK</span></li>
            <li>Shipping Cost <span>0 Tk</span></li>
            <li>Grand Total <span>{{Cart::total()}} TK</span></li>
          </ul>
            <a class="btn btn-default update" href="">Update</a>
            <a class="btn btn-default check_out" href="">Check Out</a>
        </div>
      </div>
    </div>
  </div>
</section><!--/#do_action-->
@endsection