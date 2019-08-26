@extends('layouts.app')

@section('content')
                <h1>Name: {{ $users->name }}</h1>
                <h3>
                    <li>Surname:  {{ $users->surname }}</li>
                    <li>email: {{$users->email}}</li>
                    <li>Birthday: {{$users->birthday}} </li>
                    <li>phone_number: {{$users->phone_number}}</li>
                </h3>

@endsection
