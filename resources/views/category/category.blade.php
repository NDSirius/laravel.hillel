@extends('layouts.app')

@section('content')
    @foreach ($categories as $category)
        <ul>
            <li>

                <a href="{{ route('category.show', $category->id)}}">{{$category->name}}</a>

            </li>
        </ul>
    @endforeach
    {{$categories->links()}}
@endsection