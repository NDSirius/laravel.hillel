@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">{{__('Wish List')}} </h3>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                @if(Cart::instance('wishlist')->count() > 0)
                    <table class="table table-light">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                        </tr>
                        </thead>

                        <tbody>

                        @each('user.wishlist.parts.product_view', Cart::instance('wishlist')->content(), 'row')

                        </tbody>

                    </table>
                @else
                    <h3 class="text-center"> There are no products in wishlist </h3>
                @endif

            </div>
        </div>
    </div>

    </div>
    </div>
@endsection
