@extends('layouts.app')

@section('content')
    @foreach ($categories as $category)
        <ul>
            <li>
                <a href="/category/showCategory/{{$category->id}}">{{$category->name}}</a>

            </li>
        </ul>
    @endforeach
    {{$categories->links()}}
@endsection