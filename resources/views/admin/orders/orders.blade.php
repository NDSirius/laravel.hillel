@extends('layouts.app')

@section('content')
    @foreach ($orders as $order)
        <ul>
            <li>

                <a href="{{ route('admin.admin.orderShow', $order->id)}}">{{$order->id}}</a>

            </li>
        </ul>

    @endforeach
    {{$orders->links()}}
@endsection