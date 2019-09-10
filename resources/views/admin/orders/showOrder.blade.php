@extends('layouts.app')

@section('content')
                <h1>Id: {{ $orders->id }}</h1>
                <h3>
                    <li>User_id:  {{ $orders->user_id }}</li>
                    <li>status_id: {{$orders->status_id}}</li>
                    <li>Country: {{$orders->shipping_data_country}} </li>
                    <li>City: {{$orders->shipping_data_city}}</li>
                    <li>Adress: {{$orders->shipping_data_address}} </li>
                    <li>Total Price: {{$orders->total_price}} $</li>
                </h3>

@endsection


