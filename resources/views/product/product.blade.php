
@extends('layouts.app')

@section('content')

    @foreach ($products as $product)

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            @if( Storage::has ($product->thumbnail))
                                <img src="{{ Storage::url($product->thumbnail) }}" height="400" width="400" class="card-img-top"
                                     style="max-width: 100%; margin: 0 auto; display: block;">
                            @endif

                            <div class="card-body">
                                <a href="{{ route('product.show', $product->id) }}">{{$product->title}}</a>
                                <a>{{$product->short_description}}</a>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="{{ route('product.show', $product->id) }}"
                                                   class="btn btn-sm btn-outline-dark">{{ __('Show') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="text-muted">{{$product->getPrice()}}$</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        </main>

        <footer class="text-muted">

        </footer>

    @endforeach
    {{$products->links()}}
@endsection






