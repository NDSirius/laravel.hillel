@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">{{__('Change Order')}}</h3>
            </div>
            <div class="col-md-12">
                <form action="{{route('admin.orders.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="shipping_data_country" class="col-md-4 col-form-label text-md-right">{{ __('shipping_data_country') }}</label>

                        <div class="col-md-6">
                            <input id="shipping_data_country" type="text" class="form-control @error('shipping_data_country') is-invalid @enderror" name="shipping_data_country" value="{{ old('shipping_data_country') }}" required autocomplete="shipping_data_country" autofocus>

                            @error('shipping_data_country')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="shipping_data_city" class="col-md-4 col-form-label text-md-right">{{ __('shipping_data_city') }}</label>

                        <div class="col-md-6">
                            <input id="shipping_data_city" type="text" class="form-control @error('shipping_data_city') is-invalid @enderror" name="shipping_data_city" value="{{ old('shipping_data_city') }}" required autocomplete="shipping_data_city" autofocus>

                            @error('shipping_data_city')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="shipping_data_address" class="col-md-4 col-form-label text-md-right">{{ __('shipping_data_address') }}</label>

                        <div class="col-md-6">
                            <input id="shipping_data_address" type="text" class="form-control @error('shipping_data_address') is-invalid @enderror" name="shipping_data_address" value="{{ old('shipping_data_address') }}" required autocomplete="shipping_data_address" autofocus>

                            @error('shipping_data_address')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="total_price" class="col-md-4 col-form-label text-md-right">{{ __('total_price') }}</label>

                        <div class="col-md-6">
                            <input id="total_price" type="text" class="form-control @error('total_price') is-invalid @enderror" name="total_price" value="{{ old('total_price') }}" required autocomplete="total_price" autofocus>

                            @error('total_price')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" id="user_id" name="user_id" value="">



                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Edit order') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
