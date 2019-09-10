@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">{{__('Cart Page')}} </h3>
            </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
            <div class="col-md-12">
                @if(Cart::instance('cart')->count() > 0)
                <table class="table table-light">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>

                    <tbody>

                    @each('cart.parts.product_view', Cart::instance('cart')->content(), 'row')

                    </tbody>

                </table>
                @else
                    <h3 class="text-center"> There are no products in cart </h3>
                @endif
                <table class="table table-dark" style="width:40%; float: right;">
                    <tbody>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>Subtotal</td>
                        <td>{{Cart::subtotal()}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>Tax</td>
                        <td>{{Cart::tax()}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>Total</td>
                        <td>{{Cart::total()}}</td>

                    </tr>
                    <form action="{{ route('cart.destroy') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-dark cart-options">Destroy</button>
                    </form>
                    </tbody>
                </table>
            </div>
                </div>
        <form action="{{ route('create.order') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-dark cart-options">Create Order</button>
        </form>
            </div>


        </div>
    </div>
@endsection
