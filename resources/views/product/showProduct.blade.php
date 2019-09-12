@extends('layouts.app')
@inject('wishlist', 'App\Services\WishListService')
@section('content')
    <div class="container">
        <div class="card mb-4 shadow-sm">
            @if( Storage::has ($products->thumbnail))
                <img src="{{ Storage::url($products->thumbnail) }}" height="400" width="400" class="card-img-top"
                     style="max-width: 45%; margin: 0 auto; display: block;">
            @endif

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
                <form class="form-horizontal poststars" action="{{ route('rating.edit', $products) }}" id="addStar" method="POST">
                    @csrf
                    <div class="form-group required">
                        <div class="form-group required">
                            <div class="col-sm-12">
                                <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                                <label class="star star-5" for="star-5"></label>
                                <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                                <label class="star star-4" for="star-4"></label>
                                <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                                <label class="star star-3" for="star-3"></label>
                                <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                                <label class="star star-2" for="star-2"></label>
                                <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                                <label class="star star-1" for="star-1"></label>
                            </div>
                        </div>

                    </div>
                </form>
                    <hr>
        @if($wishlist->isUserFollowed($products))
                <form action="{{ route('wishlist.delete', $products) }}" method="POST">
                    @csrf

                    <button type="submit" class="btn btn-online-danger">Delete</button>
                </form>
            @else
        <a href="{{ route('wishlist.add', $products) }}" class="btn btn-success"> {{__('Add to Wish List')}}</a>
                @if(Auth::user() && Auth::user()->role_id == 1)
                    <a href="{{ route('admin.products.edit', $products) }}" class="btn btn-danger"> {{__('Edit Product')}}</a>
                    <a href="{{ route('admin.products.delete', $products) }}" class="btn btn-danger"> {{__('Delete Product')}}</a>
                @endif
        @endif
            @endauth
    </div>
    </div>
    <script>
        $ (function(){
            $('#addStar').change('.star', function(e){
                $(this).submit();
            });
        });
    </script>
    <link href="styles/jquery.rating.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

    <script type="text/javascript">
        window.jQuery || document.write('<script type="text/javascript" src="js/jquery-1.6.2.min.js"><\/script>');
    </script>

    <script type="text/javascript" src="js/jquery.rating.js"></script>

@endsection
