@extends('layouts.app')

@section('content')

    <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="products-section my-orders container">
        <div class="sidebar">

            <ul>
                <li><a href="{{ route('account.user.account') }}">My Profile</a></li>
            </ul>
        </div> <!-- end sidebar -->
        <div class="my-profile">
            <div class="products-header">
                <h1 class="stylish-heading">My Orders</h1>
            </div>

            <div>
                @foreach ($orders as $order)
                    <div class="order-container">
                        <div class="order-header">
                            <div class="order-header-items">
                                <div>
                                    <div class="uppercase font-bold">Order ID</div>
                                    <div>{{ $order->id }}</div>
                                </div>
                                <div>
                                    <div class="uppercase font-bold">user id</div>
                                    <div>{{ $order->user_id }}</div>
                                </div>
                                <div>
                                    <div class="uppercase font-bold">Name</div>
                                    <div>{{ $order->user_name }}</div>
                                </div>
                                <div>
                                    <div class="uppercase font-bold">Surname</div>
                                    <div>{{ $order->user_surname }}</div>
                                </div>
                                <div>
                                    <div class="uppercase font-bold">Email</div>
                                    <div>{{ $order->email }}</div>
                                </div>
                                <div>
                                    <div class="uppercase font-bold">Email</div>
                                    <div>{{ $order->email }}</div>
                                </div>
                                <div>
                                    <div class="uppercase font-bold">Phone number</div>
                                    <div>{{ $order->phone_number }}</div>
                                </div>
                                <div>
                                    <div class="uppercase font-bold">Order status</div>
                                    <div>{{ $order->status_id }}</div>
                                </div>
                                <div>
                                    <div class="uppercase font-bold">shipping_data_country</div>
                                    <div>{{ $order->shipping_data_country }}</div>
                                </div>
                                <div>
                                    <div class="uppercase font-bold">shipping_data_city</div>
                                    <div>{{ $order->shipping_data_city }}</div>
                                </div>
                                <div>
                                    <div class="uppercase font-bold">shipping_data_address</div>
                                    <div>{{ $order->shipping_data_address  }}</div>
                                </div>
                                <div>
                                    <div class="uppercase font-bold">  total_price</div>
                                    <div>{{ $order->total_price  }}</div>
                                </div>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div> <!-- end order-container -->
                @endforeach
            </div>

            <div class="spacer"></div>
        </div>
    </div>

@endsection


