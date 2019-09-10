@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">{{__('Create Order')}}</h3>
            </div>
            <div class="col-md-12">
                <form action="{{route('store.order')}}" method="post">
                    @csrf



                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" autocomplete="name" autofocus>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="surname" value="{{ $user->surname }}" autocomplete="surname" autofocus>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email">

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone number') }}</label>
                        <div class="col-md-6">
                            <input id="phone_number" type="tel" placeholder="+38(000)000-00-00" pattern="^\+\d{2}\(\d{3}\)\d{3}-\d{2}-\d{2}$" class="form-control" name="phone_number">

                        </div>
                    </div>

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



                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Create order') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
