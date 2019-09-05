@extends('layouts.app')

@section('content')
    @foreach ($users as $user)
        <ul>
            <li>

                <a href="{{ route ('admin.admin.userShow', $user->id)}}">{{$user->surname}}</a>

            </li>
        </ul>
    @endforeach
    {{$users->links()}}
@endsection