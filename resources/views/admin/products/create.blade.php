@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">{{__('Create Product')}}</h3>
            </div>
            <div class="col-md-12">
            <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="sku" class="col-md-4 col-form-label text-md-right">{{ __('sku') }}</label>

                    <div class="col-md-6">
                        <input id="sku" type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" value="{{ old('sku') }}" required autocomplete="sku" autofocus>

                        @error('sku')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                        @error('title')
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
                    <label for="short_description" class="col-md-4 col-form-label text-md-right">{{ __('Short description') }}</label>

                    <div class="col-md-6">
                        <textarea name="short_description" id="short_description" cols="10" class="form-control @error('short_description') is-invalid @enderror" rows="10" required>{{ old('short_description') }}</textarea>
                        @error('short_description')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                    <div class="col-md-6">
                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

                        @error('price')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="in_stock" class="col-md-4 col-form-label text-md-right">{{ __('In stock') }}</label>

                    <div class="col-md-6">
                        <input id="in_stock" type="number" class="form-control @error('in_stock') is-invalid @enderror" name="in_stock" value="{{ old('in_stock') }}" required autocomplete="in_stock" autofocus>

                        @error('in_stock')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="thumbnail" class="col-md-4 col-form-label text-md-right">{{ __('thumbnail') }}</label>

                    <div class="col-md-6">
                        <input id="thumbnail" type="file" class="@error('thumbnail') is-invalid @enderror" name="thumbnail" value="{{ old('thumbnail') }}" required autocomplete="thumbnail" autofocus>

                        @error('thumbnail')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="thumbnail"
                           class="col-md-4 col-form-label text-md-right">{{ __('Product Gallery') }}</label>
                    <div class="col-md-6">
                        <input id="thumbnail" type="file"
                               class="form-control @error('product_gallery') is-invalid @enderror"
                               name="product_gallery[ ]" value="{{ old('product_gallery') }}"
                               accept="image"
                               autocomplete="product_gallery" multiple="multiple">
                        @error('product_gallery')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <label for="selectCategory"
                class="col-md-4 col-form-label text-md-right">{{ __('Choose Category') }}</label>
                <select name="categories[]" id="categories" multiple="multiple">
                @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                </select>





                <div class="form-group row ">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Create product') }}
                    </button>
                </div>

            </form>
            </div>
        </div>
    </div>
@endsection
