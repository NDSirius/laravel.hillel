@extends('layouts.app')

@section('content')
    <h1>{{ $categories->name }}</h1>
    <h3>
        <li>Description:  {{ $categories->description }}</li>
    </h3>

@endsection
