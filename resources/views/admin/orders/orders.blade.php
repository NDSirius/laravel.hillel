@extends('layouts.app')

@section('content')
    @foreach ($users as $user)
        <ul>
            <li>

                <a href="users/showUser/{{$user->id}}">{{$user->surname}}</a>

            </li>
        </ul>
    @endforeach
@endsection