@extends('Fontend.layouts.master')

@section('content')
<section id="advertisement">
  <div class="container">
    <img src="{{asset('frontend')}}/images/shop/advertisement.jpg" alt="" />
  </div>
</section>
<!--category and brand-->
@include('Fontend.partials.sidebar')
      <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
          <h2 class="title text-center">Features Items</h2>
          @foreach($products as $data)
          <div class="col-sm-4">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <img src="{{asset('frontend')}}/images/shop/product12.jpg" alt="" />
                  <h2>
                    @if($data->sale_price != null && $data->sale_price > 0)
                      BDT <strike>{{$data->price}}</strike> <p>BDT {{$data->sale_price}}</p>
                    @else
                    BDT {{$data->price}} Tk
                    @endif
                  </h2>
                  <p>{{$data->title}}</p>
                  <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
                <div class="product-overlay">
                  <div class="overlay-content">
                    <h2>
                      @if($data->sale_price != null && $data->sale_price > 0)
                        BDT <strike>{{$data->price}}</strike> <p>BDT {{$data->sale_price}}</p>
                      @else
                      BDT {{$data->price}} Tk
                      @endif
                    </h2>
                    <p>{{$data->title}}</p>
                    <a href="{{route('product.details',$data->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>
                </div>
              </div>
              <div class="choose">
                <ul class="nav nav-pills nav-justified">
                  <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                  <li><a href="{{route('product.details',$data->id)}}"><i class="fa fa-plus-square"></i>Details</a></li>
                </ul>
              </div>
            </div>
          </div>
          @endforeach
          <ul class="pagination">
            <li>{{$products->links()}}</li>
          </ul>
        </div><!--features_items-->
      </div>
    </div>
  </div>
</section>

@endsection
