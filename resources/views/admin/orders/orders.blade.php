@extends('layouts.app')

@section('content')
    @foreach ($orders as $order)
        <ul>
            <li>

                <a href="orders/showOrder/{{$order->id}}">{{$order->id}}</a>

            </li>
        </ul>

    @endforeach
    {{$orders->links()}}
@endsection