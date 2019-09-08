@extends('layouts.app')

@section('content')
    <h1>{{ $categories->name }}</h1>
    <h3>
        <li>Description:  {{ $categories->description }}</li>
    </h3>
    @if(Auth::user() && Auth::user()->role_id == 1)
        <a href="{{ route('admin.categories.edit', $categories) }}" class="btn btn-danger"> {{__('Edit Category')}}</a>
        <a href="{{ route('admin.categories.delete', $categories) }}" class="btn btn-danger"> {{__('Delete Category')}}</a>
    @endif

@endsection
