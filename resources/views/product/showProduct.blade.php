@extends('layouts.app')

@section('content')
                <h1>{{ $products->title }}</h1>
                <h3>
                    <li>Description:  {{ $products->description }}</li>
                    <li>SKU: {{$products->sku}}</li>
                    <li>Price: {{$products->price}} $</li>
                    <li>In_Stock: {{$products->in_stock}}</li>
                </h3>

@endsection
