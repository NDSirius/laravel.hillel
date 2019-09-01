@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">{{__('Create Category')}}</h3>
            </div>
            <div class="col-md-12">
                <form action="{{route('admincategories.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="sku" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('sku') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                        <div class="col-md-6">
                            <textarea name="description" id="description" cols="10" class="form-control @error('description') is-invalid @enderror" rows="10" required>{{ old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Create category') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
