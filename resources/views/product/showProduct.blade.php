@extends('layouts.app')
@inject('wishlist', 'App\Services\WishListService')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
    <h1>{{ $products->title }}</h1>
        <h3>
            <img src="storage/images/products/{{$products->thumbnail }}" height="250" width="350">
            <li>Description:  {{ $products->description }}</li>
            <li>SKU: {{$products->sku}}</li>
            <li>Price: {{$products->getPrice()}} $</li>
            <li>In_Stock: {{$products->in_stock}}</li>
        </h3>
        @auth
        @if($products->in_stock >0)
            <h1>
            <div>
                <p>Add to Cart: </p>
                <form action="{{ route('cart.add', $products) }}" method="POST" class="form-inline">
                    @csrf
                    @method('post')
                <div class="form-group mx-sm-3 mb-2">
                    <input type="hidden" name="price_with_discount" value="">
                <label for="product_count  " class="sr-only"> Count: </label>
                <input type="number"
                       name="product_count"
                       class="form-control"
                       id="product_count"
                       min="1"
                       max="{{ $products->in_stock }}"
                       value="1">

            </div>
                    <button type="submit" class="btn btn-primary mb-2">Buy</button>
            </form>
        </div>
            </h1>
            @endif
                    <hr>
        @if($wishlist->isUserFollowed($products))
                <form action="{{ route('wishlist.delete', $products) }}" method="POST">
                    @csrf

                    <button type="submit" class="btn btn-online-danger">Delete</button>
                </form>
            @else
        <a href="{{ route('wishlist.add', $products) }}" class="btn btn-success"> {{__('Add to Wish List')}}</a>
        @endif
            @endauth
    </div>
    </div>

@endsection
