@extends('Fontend.layouts.master')

@section('content')

@include('Fontend.partials.banner')
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                @foreach($productInfo as $product)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <a href="{{route('product.details',$product->slug)}}">
                            <img class="card-img-top" src="{{$product->getFirstMediaUrl('product')}}" alt="{{$product->title}}">
                        </a>
                        <div class="card-body">
                            <a href="{{route('product.details',$product->slug)}}">
                                <p class="card-text">{{$product->title}}</p>
                            </a>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <form action="{{route('cart.add')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <button type="submit" href="" class="btn btn-sm btn-outline-secondary">Add to Cart</button>
                                    </form>

{{--                               <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
                                </div>
                                <strong class="text-muted">
                                    @if($product->sale_price != null && $product->sale_price > 0)
                                      BDT <strike>{{$product->price}}</strike> BDT {{$product->sale_price}}
                                    @else
                                    BDT {{$product->price}} Tk
                                    @endif
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{ $productInfo->render() }}
            </div>
        </div>
    </div>
@endsection
