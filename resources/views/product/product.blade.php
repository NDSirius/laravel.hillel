@extends('layouts.app')

@section('content')
    @foreach ($products as $product)
        <ul>
            <li>
        <img src="public/storage/images/products{{$product->thumbnail }}"
             alt="{{$product->short_description}}" >
        <a href="/product/showProduct/{{$product->id}}">{{$product->title}}</a>
            </li>
        </ul>
    @endforeach
@endsection